<?php
$mongoClient = new MongoClient();
$mongoClient->connect('127.0.0.1');//连接mongo

//$mongoClient->selectDB('kaka')->selectCollection('qiao')->drop(); 先删除文档

//$mongoClient->selectDB('kaka')->createCollection('qiao');  创建文档

$collection = $mongoClient->selectDB('kaka')->selectCollection('qiao');//选择文档
$db = $mongoClient->selectDB('kaka');//选择数据库

/**
 * 插入数据
 * $data = ['id' => '1','name' => 'qiao','age' => '22','book' => '春','hobby' => ['吃菜','睡觉','打痘痘']];
 *$data = ['id' => '2','name' => 'yi','age' => '26','book' => '夏','hobby' => ['荞','面','看球']];
 * $collection->insert($data);
 */


//$res = $collection->find();  find 查出所有的数据
//foreach ($res as $v) {
//    var_dump($v);
//}

//-----------找出全部name=qiao的数据
//$name = ['name' => 'qiao'];
//$res = $collection->find($name);
//foreach ($res as $v) {
//    var_dump($v);
//}

//-----------找出一条name=qiao的数据
//$name = ['name' => 'qiao'];
//$res = $collection->findOne($name);
//var_dump($res);

//-----查询同时满足多个条件的----
//$find = ['name' => 'xiaoqiao','book' => '春'];
//$res = $collection->find($find);
//foreach ($res as $v) {
//    var_dump($v);
//}

//------查询 book = '春' 或 book = '夏'的
//$find = ['$or' => [['book' => '春'],['book' => '夏']]];
//$res = $collection->find($find);
//foreach ($res as $v) {
//    var_dump($v);
//}

//------查询 book = '春' 或 age = 5的
//$find = ['$or' => [['book' => '春'],['age' => 5]]];
//$res = $collection->find($find);
//foreach ($res as $v) {
//    var_dump($v);
//}

//-----查询and or  name=xiaoqiao 并且 age ="23"或者 book = "夏"
//$find = ['name' => 'xiaoqiao','$or' => [['age' => "23"],['book' => '夏']]];
//$res = $collection->find($find);
//foreach ($res as $v) {
//    var_dump($v);
//}

//$name = ['name' => 'qiao'];  更新全部 ,变为 0：$set 1:{name => xiaoqiao},不是想要的更新
//$update = ['$set',['name' => 'xiaoqiao']];
//$collection->update($name,$update);

//-------匹配单条更新，在查找到的内容上加一条数据---------
//$name = ['name' => 'qiao'];
//$set = ['$set' => ['ming' => 'cao']];
//$collection->update($name,$set);

//-------匹配全部更新，在查找到的内容上加一条数据---------
//$name = ['name' => 'qiao'];
//$set = ['$set' => ['haha' => 'dddd']];
//$collection->update($name,$set,['multiple' => true]);

//-------匹配全部name = qiao的，把age字段值变为23 upsert=false为更新，upsert=true，为没找到就插入
//$name = ['name' => 'qiao'];
//$set = ['$set' => ['age' => '23']];
//$opt = ['upsert' => false,'multiple' => true];
//$collection->update($name,$set,$opt);

//------没找到name = qin的数据，增加 name =qin,age=23的数据
//$name = ['name' => 'qin'];
//$set = ['$set' => ['age' => '23']];
//$opt = ['upsert' => true,'multiple' => true];
//$collection->update($name,$set,$opt);

//----给name=q的age+3，确保age字段存在，且age为数字
//$name = ['name' => 'q'];
//$inc = ['$inc'=>['age' => 3]];
//$opt = ['upsert'=>true,'multiple'=>true];
//$collection->update($name,$inc,$opt);

//---这种情况会增加一条数据，qdd:"www",并没有name:111
//$name = ['name' => '111'];
//$set = ['qdd'=>'www'];
//$opt = ['upsert' => true];
//$collection->update($name,$set,$opt);

//-----更新全部 22<age<25的名称
//$age = ['age' => ['$gt' => '22','$lt' => '25']];
//$name = ['$set' => ['name' => 'xiaoqiao']];
//$opt = ['upsert' => false,'multiple' => true];
//$collection->update($age,$name,$opt);

//-----相当于添加数据----
//$data = ['name' => 'aa'];
//$collection->save($data);

//------删除文档 name = aa 的数据
//$name = ['name' => 'aa'];
//$collection->remove($name);

//-----justOne只删除一条数据-----
//$name = ['name' => 'xiaoqiao'];
//$justOne = ['justOne' => true];
//$collection->remove($name,$justOne);

//-----满足name = xiaoqiao的条数
//$name = ['name' => 'xiaoqiao'];
//$count = $collection->count($name);
//echo $count;

//------选择 age>="26"的数据
//$gt = ['age' => ['$gte' => "26"]];
//$res = $collection->find($gt);
//foreach ($res as $v) {
//    var_dump($v);
//}

//-----查询age < 24的所有数据  $lte
//$lt = ['age' => ['$lt' => '24']];
//$res = $collection->find($lt);
//foreach ($res as $v) {
//    var_dump($v);
//}

//-----$type =2 找出 age为 string的
//$res = $collection->find(['age' => ['$type' => 2]]);
//foreach ($res as $v) {
//    var_dump($v);
//}

//------$type = 16 找出 age 为 interger（数字）类型的
//$res = $collection->find(['age' => ['$type' => 16]]);
//foreach ($res as $v) {
//    var_dump($v);
//}

//-----limit 限制两条数据---
//$age = ['age' => ['$gte' => '23']];
//$res = $collection->find($age)->limit(2);
//foreach ($res as $v) {
//    var_dump($v);
//}

//---跳过前面的一个，选择后面的两个 分页实现的方式
//$age = ['age' => ['$gte' => '23']];
//$res = $collection->find($age)->limit(2)->skip(1);
//foreach ($res as $v) {
//    var_dump($v);
//}

//------------限制返回的字段，_id可以不显示
//$age = ['age' => ['$gte' => '23']];
//$returnField = ['age' => 1,'_id'=>0]; 只显示age ['_id' => 0] 只有_id不显示
//$res = $collection->find($age,$returnField)->limit(2);
//foreach ($res as $v) {
//    var_dump($v);
//}

//-----注意的地方是要对 $res(结果)做排序，不能在find后跟sort
//$res = $collection->find(['age' => ['$gt' => '22']]);
//$res->sort(['age' => -1]);
//foreach ($res as $v) {
//    var_dump($v);
//}

//-------给id加一个索引（1升序 -1降序）
//$collection->ensureIndex(['id' => 1]);

//---未验证，后台创建索引，且唯一
//$collection->ensureIndex(['id' => 1],['background' => true,'unique' => true]);

//-----根据name来分组，_id变为姓名(必须为_id)，名称有多少个
//$juhe = [
//    ['$project' => ['name' => 1,'age' => 1]],
//    ['$group' => ['_id' => '$name','name_total' => ['$sum' => 1]]]
//];
//$res = $collection->aggregate($juhe);
//var_dump($res);

//----------对name分组，求分组后age的总和
//$juhe = [
//    ['$group' => ['_id' => '$name','age_total' => ['$sum' => '$age']]]
//];
//$res = $collection->aggregate($juhe);
//var_dump($res);

//-----求平均值---
//$juhe = [[
//    '$group' => ['_id'=>'$name','age_avg' => ['$avg' => '$age']]
//]];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);


//-----求最小值---
//$juhe = [[
//    '$group' => ['_id'=>'$name','age_min' => ['$min' => '$age']]
//]];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);


//-----求最大值---
//$juhe = [[
//    '$group' => ['_id'=>'$name','age_max' => ['$max' => '$age']]
//]];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);


//-----$push就强大了,将分组下的每条数据的age放在girl这个字段数组中
//$juhe = [[
//    '$group' => ['_id'=>'$name','girl' => ['$push' => '$age']]
//]];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);

//-----$addToSet就强大了,将分组下的每条数据的age放在girl这个字段数组中,值不能是重复的
//$juhe = [[
//    '$group' => ['_id'=>'$name','girl' => ['$addToSet' => '$age']]
//]];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);

//---first 获取第一个数据（age）存入 first字段
//$juhe = [[
//    '$group' => ['_id'=>'$name','first' => ['$first' => '$age']]
//]];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);

//-----获取最后一个数据（age）存入last字段
//$juhe = [[
//    '$group' => ['_id'=>'$name','last' => ['$last' => '$age']]
//]];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);

//------还可以根据多个条件来分组----
//$juhe = [[
//    '$group' => ['_id'=>['name' => '$name','age'=>'$age'],'sum' => ['$sum' => '$age']]
//]];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);


//-----分组，匹配
//$juhe = [
//    [
//        '$group' =>['_id' => '$name','age' => ['$sum' => '$age']],
//    ],
//    [
//        '$match' => ['age' => ['$gte' => 16]] match 匹配的字段必须为 group中定义的
//    ]
//];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);

//-------分组，匹配，跳过，限制，排序
//$unwind：将文档中的某一个数组类型字段拆分成多条，每条包含数组中的一个值。
//$geoNear：输出接近某一地理位置的有序文档。
//$juhe = [
//    [
//        '$group' =>['_id' => '$name','age' => ['$sum' => '$age']],
//    ],
//    [
//        '$match' => ['age' => ['$gte' => 12]]
//    ],
//    [
//        '$skip' =>1
//    ],
//    [
//        '$limit' => 1
//    ],
//    [
//        '$sort' => ['age' => -1]
//    ]
//];
//$res = $collection->aggregate($juhe);
//var_dump($res['result']);

//------批量插入数据-----
//$data  = [
//    ['name' => 'qiqi','age' => 11],
//    ['name' => 'yiyi','age' => 12],
//];
//$collection->batchInsert($data);

//---加索引 同ensureIndex
//$collection->createIndex(['name' => 1]);
//$collection->deleteIndex('name'); 删除索引

//-----获取去重的 name
//$res = $collection->distinct('name');
//foreach ($res as $v) {
//    var_dump($v);
//}

//---找到符合条件的第一条进行更改
//$name = ['name' => 'yi'];
//$collection->findAndModify($name,['$set' => ['age' => 11]]);


//-----只获取_id字段----唯一 存入数组 idArr,idArr存入 Users文档中 ----连表查询 address 单独存在qiao文档中的
//$res = $collection->find([],['_id'=>1]);
//$idArr = [];
//foreach ($res as $v) {
//    $idArr[] = $v['_id'];
//}
//
//$collecti = $mongoClient->selectDB('kaka')->selectCollection('Users');
//$data = ['name' => 'qiao','sex' => 'girl','address' => $idArr];
//$collecti->insert($data);

//$name = ['name' => 'qiao'];
//$res = $collecti->findOne($name,['_id'=>0]);
//$idArr = $res['address'];
//$res['address'] = [];
//foreach ($idArr as $id) {
//    $findId = ['_id'=>$id];
//    $returnField = ['_id'=>0];
//    $address = $collection->findOne($findId,$returnField);
//    $res['address'][] = $address;
//}
//var_dump($res);

//------------根据_id来删除指定数据------
//$users->remove(['_id' => new MongoId('592792c287688af80d00002f'),true]);


// -------------一个文档从多个集合引用文档，我们应该使用 DBRefs。
$qiao = $db->qiao;
$users = $db->Users;

//$address = ['address' => '成都'];
//$dbfRes = $qiao->findOne($address);  //findOne很重要，不能是find
//
//$createDbf = $qiao->createDBRef($dbfRes);
//$name = ['name' => 'qiao'];
//$users->update($name,['$push' => ['city' => $createDbf]]);

//$res = $users->findOne($name);
//foreach ($res['city'] as $city) {
//    $ci = $users->getDBRef($city);
//    echo $ci['address']."\n";
//}


//不能使用覆盖索引查询：所有索引字段是一个数组 所有索引字段是一个子文档
//$qiao->createIndex(['address'=>1,'phone'=>1]); 创建覆盖索引 _id不能返回，返回索引不使用

//----explain() 分析是否使用索引  hint强制使用索引
//$res = $qiao->find(['address'=>'成都'],['phone'=>1,'_id'=>0]);
//var_dump($res->explain());
//db.users.find({gender:"M"},{user_name:1,_id:0}).hint({gender:1,user_name:1})

//----findAndModify 参数说明 query  update  returnField  caozuo(排序什么的)  找到并更新
//$res = $qiao->findAndModify(
//    ['phone' => '123321'],
//    ['$set'=>['phone' => '111222']],
//    ['phone'=>1,'name'=>1],
//    ['new' => true]
//);
//var_dump($res);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$set'=>['kak'=>'111']] //增加kak字段
//);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$unset'=>['kak'=>1]] //删除kak字段
//);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$inc' => ['age' => 2]] //数字变化
//);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$push' => ['hobby' => ['吃饭','睡觉','大豆都']]] //hobby必须是数组
//);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$push' => ['hobby' => '哈哈']] //加入一个值到hobby
//);

//$arr = ['a','b','c'];
//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$pushAll' => ['hobby' => $arr]] //加入一个数组到hobby
//);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$pull'=>['hobby'=>'哈哈']] //删除数组 hobby中的值为'哈哈的数据'  hobby必须是一个数组
//);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$addToSet'=>['address'=>'a']] //向数组 address增加值a，只有当a不存在时才加进去  address必须是一个数组
//);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$pop'=>['address'=>1]] //删除数组address中最后一个值
//);

//$qiao->findAndModify(
//    ['name' => 'qin'],
//    ['$rename'=>['address'=>'地址']] //更名address 为 地址
//);

//索引数组字段- 需要对数组中的每个字段依次建立索引 为数组 tags 创建索引时，会自动为值建立索引
//索引子文档字段，就需要自己建了 如：db.users.ensureIndex({"address.city":1,"address.state":1,"address.pincode":1})

//查询限制
//索引不能被以下的查询使用：
//正则表达式及非操作符，如 $nin, $not, 等。
//算术运算符，如 $mod, 等。
//$where 子句
//所以，检测你的语句是否使用索引是一个好的习惯，可以用explain来查看。

//最大范围
//集合中索引不能超过64个
//索引名的长度不能超过128个字符
//一个复合索引最多可以有31个字段

//-----生成一个唯一id
//$id = new MongoId();
//echo $id;

//----建立全文索引，只能建立一个
//$qiao->createIndex(['name' => 'text']);
//$qiao->deleteIndex('dd'); 删除索引

//--- name字段上建立了全文索引，name 字段上出现 qin 的检出 不包括中文
//$res = $qiao->find(['$text' => ['$search' =>'qin']]);
//foreach ($res as $v) {
//    var_dump($v);
//}

//---$regex正则检出 name字段中有qi的数据
//$res = $qiao->find(['name' => ['$regex' => 'qi']]);
//foreach ($res as $v) {
//    var_dump($v);
//}

//----$options 不区分大小写
//$res = $qiao->find(['name' => ['$regex' => 'QI','$options' => '$i']]);
//foreach ($res as $v) {
//    var_dump($v);
//}

//----tags 为一标签数组---数组中存在满足条件的数据
//$res = $qiao->find(['tags'=>['$regex'=>'run','$options'=>'$i']]);
//foreach ($res as $v) {
//    var_dump($v);
//}

//MongoDB 固定集合（Capped Collections）是性能出色且有着固定大小的集合，对于大小固定，我们可以想象其就像一个环形队列，
//当集合空间用完后，再插入的元素就会覆盖最初始的头部的元素！

//---创建固定集合 10000字节
//$db->createCollection('chen',['capped' => true,'size' => 10000]);
//---创建固定集合 10000字节 最多100个文档---
//$db->createCollection('chen',['capped' => true,'size' => 10000,'max' => 100]);

$chen = $db->selectCollection('chen');

//----$natural = -1 倒叙返回
//$res = $chen->find()->sort(['$natural' => -1]);
//foreach ($res as $v) {
//    var_dump($v);
//}

//属性1:对固定集合进行插入速度极快
//属性2:按照插入顺序的查询输出速度极快
//属性3:能够在插入最新数据时,淘汰最早的数据
//用法1:储存日志信息
//用法2:缓存一些少量的文档







































































































































































