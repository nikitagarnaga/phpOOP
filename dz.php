<pre>

<?php



class Activity {
	
	public $web, $sale, $design;

	public function webGet (){
		echo "Направление " . $this->web;
	}
	
	public function webSet ($web){
		$this->web = $web;
	}

}


class Course extends Activity {

	public $php;

	public function phpSet($php){
		echo "курс " . $this->php = $php;
	}
	
}



class Group extends Course {

	public $php9, $gender, $count;

	public function GroupSet($php9){
		echo "группа " . $this->php9 = $php9;
	}

}

$activity = new Activity();
$activity->webSet('programing ');
$activity->webSet($activity->webGet());

$cours = new Course();
$cours->webGet($cours->webSet('programing '));
$cours->phpSet('php');

$group = new Group();
$group->webGet();
$group->GroupSet('php 9');



