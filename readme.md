# PHP 8 Utils
Bunch of helpful classes, interfaces, traits.
- **E-mail** (gives you domain of email)
- Person, **Name** (automatically separates first and last name)
- Comparator + interface Comparable
- Sorter (using our Comparable interface)
- Messenger, Message
- Pair, Array
- cached data storage (useful for complex repositories)
- interface Databaseable
- simple Cron (queue of definable tasks)

## Using
This is an introduction of some features included in this bundle.
### Databaseable
This interface is useful for preparing data for saving into a database.
```
class DatabaseEntity implements Databaseable {

    /** @var int */
    protected $id;

    public function row(): array {
        return [
            "id" => $this->$id
        ];
    }
}
```
### Cached Data Storage
If you want to speed up your system, a cache is probably one of the way which you may choose. Using is very easy. Look at the example below.
#### Example
```
// your object
$object = new SerializableObject();

// init our data storage
$cache = new DataStorage(__DIR__ . "/../tmp");

// init unique key of your object for our storage
$key = new Key($object->id, "some_prefix_of_your_repository");

// save/replace data
$cache->add($key, $object);

// load data
$objectFromCache = $cache->get($key);

// and if your data have changed, just call 'notifyChange', it will be erase object from cache
$cache->notifyChange($key);
```
**Hint:** It is very useful in complex repositories, when some data depend on other data and you are able to speed up whole system, because you load only changed data.
### Dependency
That is very useful for multi-level caching of data structures. For example: Imagine that you have a data object called X compounded from smaller data objects A, B and C coming from different resources. For a better speed of a system it is good to use cache for each small object A, B and C and to create dependency between these small objects and the big one X, which would be in the cache as well. This will cause that if change any of the small objects - only that object would be need to reload. After it, the big one will be created from two small from the cache and third (now reloaded) also from cache. At the end the big one X will be stored in the cache as well again until any of the smaller objects will change.
#### Example
```
// defining dependencies with IKey
$cache->createDependency($childKey, $parentKey);
$cache->createDependency($parentKey, $grandParentKey);

// automatic update of parent and grandparent when child changed
$cache->notifyChange($childKey)
```
Because of a child changed, all dependent data (a child, a parent and a grandparent) have become invalid and will be overridden with a newer version of data.
### Cron
This is a very simple `class` for creating a queue of tasks. You can basically create only one file `run.php` with tasks definition and execute only that.
#### Example
```
// OPTIONAL
// when you plan to use time-based tasks, you have to set a folder for persist files
Clock::setDataPath( __DIR__ . "/persistData/clocks" );

// creating a Cron
$cron = new Cron();

// class MyTask implements interface ITask or extends abstract class TimedTask
$cron->addTask( new MyTask() );
$cron->addTask( ... );

// executing
$cron->run();

// feedback
foreach ($cron->messenger as $message) {
    echo $message->type . ": " . $message->text;
}
```