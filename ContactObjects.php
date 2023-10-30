<?php
//Defines an abstract class, BaseContact with methods that are also abstract.
// Set and get methods are set to public visibility to manipulate the class.
abstract class BaseContact{
    abstract public function get_name();
    abstract public function set_name($name);
    public $phone_number;
    public function _toString(){
        $s = "".$this->get_name();
        if($this->phone_number){
            if(strlen($s)>0){
                $s.=": ";
            }else{
                $s.="Someone's Phone Number: ";
            }
            $s.=$this->phone_number;
        }
        return $s;
    }
}

//PersonContact inherits the properties and methods of the BaseContact class since it extends it. Because BaseContact is an abstract class, PersonContact has to implement the abstract methods of the parent class.
class PersonContact extends BaseContact{
    public $first_name;
    public $last_name;
    public function _construct($first_name = null,$last_name=null){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }
    public function get_name(){
        return $this->first_nam."".$this->last_name;
    }
    public function set_name($name){
        $split_name = explode("",$name,2);
        $length = count($split_name);
        $rv = true;
        if($length==0){
            $rv=false;
        }
        elseif($length ===1){
            $this->first_name = $this->last_name=$split_name[0];
        }else{
            $this->first_name=$split_name[0];
            $this->last_name=$split_name[1];
        }
        return $rv;
    }
}

//OrganizationContact also extends an abstract class and must implement its abstract methods. The get name functions returns the value for the name property of the class. The set name method sets the name property equal to the value/argument passed to the method. The _construct method serves as a constructor by initializing the name property to a given value.
class OrganizationContact extends BaseContact{
    public $name;
    public function _construct($name = null){
        $this->name=$name;
    }
    public function get_name(){
        return $this->name;
    }
    public function set_name($name){
        $this->name=$name;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Object Oriented Programming - Simple Class</title>
</head>
<body>
<strong>Person Contact, Empty Constructor, Two Names</strong>
<br>
<?php
//A new PersonContact object is created from the PersonContact class, where a name is set using the access operator and set_name. The phone number property for the object Angelo is also set. The properties are then displayed.
$angelo = new PersonContact();
$angelo->set_name("Angelo Roncalli");
$angelo->phone_number = "777-777-7777";
?>
<p><?php print $angelo ?></p>

<strong>Person Contact, Empty Constructor, Three Names</strong>
<br>
<?php
$john = new PersonContact();
$john->set_name("John Giuseppe Roncalli");
$john->phone_number="777-777-7777";
?>
<p><?php print $john ?></p>
<strong>Person Contact,Parameterized Constructor</strong>
<br>
<?php
//A person contact object is created using a constructor that takes arguments, i.e the first annd last name. The access operator is then used to set the phone property.
$mary = new PersonContact("Mary", "Roncalli");
$mary->phone_number="777-777-7777";
?>
<p><?php print $mary ?></p>
<strong>Organization Contact, Empty Constructor</strong>
<?php
//Organization contact object is created,name is set using the set_name method, and phone_number property is directly set.
$parish = new OrganizationContact();
$parish->set_name("Parish");
$parish->phone_number = "777-777-7777";
?>
<p><?php print $parish ?></p>
<strong>Organization Contact,Parameterized Constructor</strong>
<br>
<?php
$parish = new PersonContact("Parish");
$parish->phone_number="777-777-7777";

?>
<p><?php print $parish ?></p>
</body>
</html>
