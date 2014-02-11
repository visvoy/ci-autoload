ci-autoload
===========

Model &amp; Library autoload for CodeIgniter

### Without autoload, your code like this:
	$this->load->library('aladdin');
	$this->load->library('giant');
	$this->load->model('student');
	$this->load->model('teacher');
	...
	$this->load->model('blablabla');
	
	// then we begin to work
	$this->aladdin->summon('Arab God');
	$this->giant->breakTheWall('Rose');
	$this->student->playGame('lol');
	$this->teacher->teach();
	
### Now you can ignore all ->load->
	// Start working at the beginning
	$this->aladdin->summon('Arab God');
	$this->giant->breakTheWall('Rose');
	$this->student_model->playGame('lol');
	$this->teacher_model->teach();
	
### How does it work?
Just copy `application/core/MY_Controller.php` to your same CI directory, that's it.

### How to use it?
#### For any library object
	$this->aladdin->summonXXX();
	means:
	$this->load->library('aladdin');
	$this->aladdin->summonXXX();

	with dash string:
	$this->myth_aladdin->summonXXX();
	means:
	$this->load->library('myth/aladdin');
	$this->myth_aladdin->summonXXX();
	
#### For any model object
	$this->student_model->playXXX();
	means:
	$this->load->model('student_model');
	$this->student_model->playXXX();

	with dash string:
	$this->school_student_model->playLOL();
	means:
	$this->load->model('school/student_model');
	$this->school_student_model->playLOL();

#### Autoload database object
	// now you can call them without $this->load->database();
	$this->db->query();
	$this->db_read->query();
	$this->db_write->query();
	
have fun :)