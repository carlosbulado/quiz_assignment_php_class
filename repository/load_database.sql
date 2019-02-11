-- Clear Database
DELETE FROM categories;
DELETE FROM tests;
DELETE FROM tests_done; 
DELETE FROM questios;
DELETE FROM questions_done;
DELETE FROM user;

-- Create user Administrator 
INSERT INTO user(id, first_name, last_name, isAdmin, username, password)
VALUES (1, 'Administrator', 'System', 1, 'admin', '123');

-- Create user Lambton Student
INSERT INTO user(id, first_name, last_name, isAdmin, username, password)
VALUES (2, 'Student', 'Lambton', 0, 'student', 'lambton');

-- Create category Development / Back-end 
INSERT INTO categories (id, name) VALUES (1, 'Development / Back-end');

-- Create category Development / Front-end 
INSERT INTO categories (id, name) VALUES (2, 'Development / Front-end');

-- Create first test - PHP
INSERT INTO tests (id, name, categoryId) VALUES (1, 'PHP', 1);

-- Create first test's questions - PHP
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (1, 'Variables/functions in PHP don’t work directly with', 1, 2, 'echo()', 'isset()', 'print()', 'All of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (2, 'What is the output of the following code', 1, 3, 'Array ([x]=9 [y]=3 [z]=-7)', 'Array ([x]=3 [y]=2 [z]=5)', 'Array ([x]=12 [y]=5 [z]=-2)', 'Error');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (3, 'Which of the following multithreaded servers allow PHP as a plug-in', 1, 4, 'Netscape FastTrack', 'Microsoft’s Internet Information Server', 'OReillys WebSite Pro', 'All of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (4, 'Which of the following type cast is not correct', 1, 3, 'real', 'double', 'decimal', 'boolean');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (5, 'What do you infer from the following code?', 1, 4, 'Only first character will be recognised and new line will be inserted.', 'Last will not be recognised and only first two parts will come in new lines.', 'All the will work and text will be printed on respective new lines.', 'All will be printed on one line irrespective of the');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (6, 'Which of the following is Ternary Operator?', 1, 4, '&', '=', '+=', '?:');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (7, 'Which of the following pair have non-associative equal precedence', 1, 2, '+,-', '==, !=', '===, !==', '&=, |=');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (8, 'Which of the following attribute is needed for file upload via form', 1, 1, 'enctype=multipart/form-data', 'enctype=singlepart/data', 'enctype=file', 'enctype=form-data/file');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (9, 'The inbuilt function to get the number of parameters passed is', 1, 3, 'arg_num()', 'func_args_count()', 'func_num_args()', 'None of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (10, 'Multiple select/load is possible with', 1, 2, 'Checkbox', 'Select', 'File', 'All of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (11, 'Which of the following statement is not correct for PHP', 1, 3, 'It is a server side scripting language', 'A PHP file may contain text, html tags or scripts', 'It can run on windows and Linux systems only', 'It is compatible with most of the common servers used today');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (12, 'Which of the following printing construct/function accpets multiple parameters', 1, 1, 'echo', 'print', 'printf', 'All of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (13, 'Which of the following vaiables is not related to file uploads', 1, 4, 'max_file_size', 'max_execution_time', 'post_max_size', 'max_input_time');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (14, 'What will be the output of following code: $a = 10; echo ‘Value of a = $a’;', 1, 1, 'Value of a = 10', 'Value of a = $a', 'Undefined', 'Syntax Error');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (15, 'Which of the following variable declarations within a class is invalid in PHP5', 1, 2, 'private $type = ‘moderate’', 'internal $term= 3', 'public $amnt = ‘500’', 'protected $name = ‘Quantas Private Limited’');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (16, 'Which of the following is used to maintain the value of a variable over different pages', 1, 3, 'static', 'global', 'session_register', 'None of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (17, 'How would you store order number (34) in an ‘OrderCookie’', 1, 1, 'setcookie(‘OrderCookie’,34)', 'makeCookie(‘OrderCookie’,34)', 'Cookie(‘OrderCookie’,34)', 'OrderCookie(34)');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (18, 'The following php variables are declared $company = ‘ABS Ltd’; $$company = ‘,Sydney’; Which of the following is not a correct way of printing ‘ABS Ltd,Sydney’?', 1, 1, 'echo ‘$company $$company’', 'echo ‘$company ${$company}’', 'echo ‘$company ${‘ABS Ltd’}’', 'echo ‘$company {$$company}’');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (19, 'Which of the following regular expressions can be used to check the validity of an e-mail addresses', 1, 2, '^[^@ ]+@[^@ ]+.[^@ ]+$', '^[^@ ]+@[^@ ]+.[^@ ]+$', '$[^@ ]+@[^@ ]+.[^@ ]+^', '$[^@ ]+@[^@ ]+.[^@ ]+^');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (20, 'You wrote the following script to check of the right category: Correct category! Incorrect category! What will be the output of the program if value of ‘cate’ remains 5', 1, 1, 'Correct category', 'Incorrect category', 'Error due to use of invalid operator in line 6:’if ($cate==5)’', 'Error due to incorrect syntax at line 8, 10, 12 and 14');

-- Create first test - JAVA
INSERT INTO tests (id, name, categoryId) VALUES (2, 'JAVA', 1);

-- Create first test's questions - JAVA
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (21, 'The default value of a static integer variable of a class in Java is', 2, 1, '0', '1', 'Garbage value', 'Null');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (22, 'Multiple inheritance means', 2, 1, 'One class inheriting from more super classes', 'More classes inheriting from one super class', 'More classes inheriting from more super classes', 'None of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (23, 'To prevent any method from overriding, we declare the method as', 2, 3, 'static', 'const', 'abstract', 'none of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (24, 'The fields in an interface are implicitly specified as', 2, 4, 'static only', 'protected', 'private', 'both static and final');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (25, 'Among these expressions, which is(are) of type String', 2, 4, '"o"', '"ab" + "cd"', '''o''', 'Both (A) and (B)');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (26, 'What is the type and value of the following expression? (Notice the integer division) -4 + 1/2 + 2*-3 + 5.0', 2, 4, 'int -5', 'double -4.5', 'int -4', 'double -5.0');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (27, 'What is printed by the following statement', 2, 3, 'Hello, \nworld!', 'Hello, world!', '“Hello, \nworld!”', 'None of the above');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (28, 'Which of the following variable declaration would NOT compile in a java program', 2, 4, 'int VAR', 'int var1', 'int var_1', 'int 1_var');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (29, 'What is byte code in the context of Java', 2, 1, 'The type of code generated by a Java compiler', 'The type of code generated by a Java Virtual Machine', 'It is another name for a Java source file', 'It is the code written within the instance methods of a class');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (30, 'The java run time system automatically calls this method while garbage collection', 2, 2, 'finalizer()', 'finalize()', 'finally()', 'finalized()');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (31, 'All exception types are subclasses of the built-in class', 2, 4, 'Exception', 'RuntimeException', 'Error', 'Throwable');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (32, 'When an overridden method is called from within a subclass, it will always refer to the version of that method defined by the', 2, 2, 'Super class', 'Subclass', 'Compiler will choose randomly', 'Interpreter will choose randomly');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (33, 'In java, objects are passed as', 2, 3, 'Copy of that object', 'Method called call by value', 'Memory address', 'Constructor');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (34, 'Which of the following is not a component of Java Integrated Development Environment (IDE)', 2, 3, 'Net Beans', 'Borland’s Jbuilder', 'Symantec’s Visual Café', 'Microsoft Visual Fox Pro');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (35, 'Identify, from among the following, the incorrect variable name(s)', 2, 3, '_theButton', '$reallyBigNumber', '2ndName', 'CurrentWeatherStateofplanet');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (36, 'An applet cannot be viewed using', 2, 4, 'Netscape navigator', 'Microsoft Internet Explorer', 'Sun’ Hot Java Browser', 'Applet viewer tool which comes, with the Java Development Kit');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (37, 'Java compiler javac translates Java source code into _______', 2, 2, 'Assembler language', 'Byte code', 'Bit code', 'Machine code');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (38, '______ are used to document a program and improve its readability', 2, 2, 'System cells', 'Keywords', 'Comments', 'Control structures');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (39, 'In Java, a character constant’s value is its integer value in the _______ character set', 2, 1, 'EBCDIC', 'Unicode', 'ASCII', 'Binary');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (40, 'An abstract data type typically comprises a _______ and a set of ________ respectively', 2, 4, 'Database, operations', 'Data representation, objects', 'Control structure, operations', 'Data representation, operations');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (41, 'In object-oriented programming, the process by which one object acquires the properties of another object is called', 2, 4, 'Encapsulation', 'Polymorphism', 'Overloading', 'Inheritance');

-- Create first test - HTML
INSERT INTO tests (id, name, categoryId) VALUES (3, 'HTML', 2);

-- Create first test's questions - HTML
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (42, 'HTML stands for', 3, 1, 'Hyper Text Markup Language', 'High Text Markup Language', 'Hyper Tabular Markup Language', 'None of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (43, 'Which of the following tag is used to mark a begining of paragraph', 3, 3, 'td', 'br', 'p', 'tr');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (44, 'From which tag descriptive list starts', 3, 3, 'll', 'dd', 'dl', 'ds');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (45, 'Correct HTML tag for the largest heading is', 3, 4, 'head', 'h6', 'heading', 'h1');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (46, 'The attribute of form tag', 3, 3, 'method', 'action', 'both A & B', 'None of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (47, 'Markup tags tell the web browser', 3, 2, 'How to organise the page', 'How to display the page', 'How to display message box on page', 'None of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (48, 'Www is based on which model', 3, 2, 'Local-server', 'Client-server', '3-tier', 'None of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (49, 'What are Empty elements and is it valid', 3, 2, 'No, there is no such terms as Empty Element', 'Empty elements are element with no data', 'No, it is not valid to use Empty Element', 'None of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (50, 'Which of the following attributes of text box control allow to limit the maximum character', 3, 3, 'size', 'len', 'maxlength', 'all of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (51, 'Web pages starts with which ofthe following tag', 3, 3, 'body', 'title', 'html', 'form');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (52, 'HTML is a subset of', 3, 2, 'SGMT', 'SGML', 'SGMD', 'None of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (53, 'Which of the following is a container', 3, 4, 'select', 'body', 'input', 'Both A & B');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (54, 'The attribute, which define the relationship between current document and HREFed URL is', 3, 1, 'REL', 'URL', 'REV', 'All of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (55, 'DT tag is designed to fit a single line of our web page but DD tag will accept', 3, 2, 'Line of text', 'Full paragraph', 'word', 'request');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (56, 'Character encoding is', 3, 3, 'method used to represent numbers in a character', 'method used to represent character in a number', 'a system that consists of a code which pairs each character with a pattern,sequence of natural numbers or electrical pulse in order to transmit the data', 'none of these');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (57, 'From which tag the descriptive list starts', 3, 3, 'LL', 'DD', 'DL', 'DS');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (58, 'Correct HTML to left align the content inside a table cell is', 3, 3, 'tdleft', 'td ralign="left"', 'td align="left"', 'td leftalign');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (59, 'The tag which allows you to rest other HTML tags within the description is', 3, 4, 'TH', 'TD', 'TR', 'CAPTION');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (60, 'Base tag is designed to appear only between', 3, 1, 'HEAD', 'TITLE', 'BODY', 'FORM');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (61, 'How can you open a link in a new browser window', 3, 2, ' a href = "url" target = "new"', 'a href = "url" target= "_blank"', 'a href = "url".new', 'a href = "url" target ="open"');








/*
DELETE FROM tests WHERE id = 4;

INSERT INTO tests (id, name, categoryId) VALUES (4, 'CSS', 2);

DELETE FROM questios WHERE id = 21;
DELETE FROM questios WHERE id = 22;
DELETE FROM questios WHERE id = 23;
DELETE FROM questios WHERE id = 24;
DELETE FROM questios WHERE id = 25;
DELETE FROM questios WHERE id = 26;
DELETE FROM questios WHERE id = 27;
DELETE FROM questios WHERE id = 28;
DELETE FROM questios WHERE id = 29;
DELETE FROM questios WHERE id = 30;
DELETE FROM questios WHERE id = 31;
DELETE FROM questios WHERE id = 32;
DELETE FROM questios WHERE id = 33;
DELETE FROM questios WHERE id = 34;
DELETE FROM questios WHERE id = 35;
DELETE FROM questios WHERE id = 36;
DELETE FROM questios WHERE id = 37;
DELETE FROM questios WHERE id = 38;
DELETE FROM questios WHERE id = 39;
DELETE FROM questios WHERE id = 40;

INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (21, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (22, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (23, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (24, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (25, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (26, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (27, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (28, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (29, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (30, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (31, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (32, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (33, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (34, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (35, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (36, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (37, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (38, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (39, '', 2, 1, '', '', '', '');
INSERT INTO questios (id, name, testId, rightAnswer, answer_01, answer_02, answer_03, answer_04) 
VALUES (40, '', 2, 1, '', '', '', '');
*/