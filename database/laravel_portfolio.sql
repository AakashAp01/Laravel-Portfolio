-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 04:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `category_id`, `content`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(12, 'My SQL basic query', 6, '<p>MySQL is a open-source, free and very popular relational database management system which is developed, distributed and supported by Oracle corporation.</p>\r\n<h3>Key Features:</h3>\r\n<ul>\r\n<li>Open-source relational database management systems.</li>\r\n<li>Reliable, very fast and easy to use database server.</li>\r\n<li>Works on client-server model.</li>\r\n<li>Highly Secure and Scalable</li>\r\n<li>High Performance</li>\r\n<li>High productivity as it uses stored procedures, triggers, views to write a highly productive code.</li>\r\n<li>Supports large databases efficiently.</li>\r\n<li>Supports many operating systems like Linux*,CentOS*, Solaris*,Ubuntu*,Windows*, MacOS*,FreeBSD* and others.</li>\r\n</ul>\r\n<h1>Syntax help</h1>\r\n<h2>Commands</h2>\r\n<h3>1. CREATE</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">CREATE</span> <span class=\"hljs-keyword\">TABLE</span> table_name (\r\n                column1 datatype,\r\n                column2 datatype,\r\n                ....);</code></pre>\r\n<h3>Example</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">CREATE</span> <span class=\"hljs-keyword\">TABLE</span> EMPLOYEE (\r\n  empId <span class=\"hljs-type\">INTEGER</span> <span class=\"hljs-keyword\">PRIMARY</span> <span class=\"hljs-keyword\">KEY</span>,\r\n  name TEXT <span class=\"hljs-keyword\">NOT</span> <span class=\"hljs-keyword\">NULL</span>,\r\n  dept TEXT <span class=\"hljs-keyword\">NOT</span> <span class=\"hljs-keyword\">NULL</span>\r\n);</code></pre>\r\n<h3>2. ALTER</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">ALTER</span> <span class=\"hljs-keyword\">TABLE</span> Table_name <span class=\"hljs-keyword\">ADD</span> column_name datatype;</code></pre>\r\n<h3>Example</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">INSERT</span> <span class=\"hljs-keyword\">INTO</span> EMPLOYEE <span class=\"hljs-keyword\">VALUES</span> (<span class=\"hljs-number\">0001</span>, <span class=\"hljs-string\">\'Dave\'</span>, <span class=\"hljs-string\">\'Sales\'</span>);</code></pre>\r\n<h3>3. TRUNCATE</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">TRUNCATE</span> <span class=\"hljs-keyword\">table</span> table_name;</code></pre>\r\n<h3>4. DROP</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">DROP</span> <span class=\"hljs-keyword\">TABLE</span> table_name;</code></pre>\r\n<h3>5. RENAME</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\">RENAME <span class=\"hljs-keyword\">TABLE</span> table_name1 <span class=\"hljs-keyword\">to</span> new_table_name1; </code></pre>\r\n<h3>6. COMMENT</h3>\r\n<h3>Single-Line Comments:</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"> <span class=\"hljs-comment\">--Line1;</span></code></pre>\r\n<h3>Multi-Line comments:</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\">   <span class=\"hljs-comment\">/* Line1,\r\n   Line2 */</span></code></pre>\r\n<h2>DML Commands</h2>\r\n<h3>1. INSERT</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">INSERT</span> <span class=\"hljs-keyword\">INTO</span> table_name (column1, column2, column3, ...) <span class=\"hljs-keyword\">VALUES</span> (value1, value2, value3, ...);</code></pre>\r\n<p>Note: Column names are optional.</p>\r\n<h3>Example</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">INSERT</span> <span class=\"hljs-keyword\">INTO</span> EMPLOYEE <span class=\"hljs-keyword\">VALUES</span> (<span class=\"hljs-number\">0001</span>, <span class=\"hljs-string\">\'Ava\'</span>, <span class=\"hljs-string\">\'Sales\'</span>);</code></pre>\r\n<h3>2. SELECT</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">SELECT</span> column1, column2, ...\r\n<span class=\"hljs-keyword\">FROM</span> table_name\r\n[<span class=\"hljs-keyword\">where</span> <span class=\"hljs-keyword\">condition</span>]; </code></pre>\r\n<h3>Example</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">SELECT</span> <span class=\"hljs-operator\">*</span> <span class=\"hljs-keyword\">FROM</span> EMPLOYEE <span class=\"hljs-keyword\">where</span> dept <span class=\"hljs-operator\">=</span><span class=\"hljs-string\">\'sales\'</span>;</code></pre>\r\n<h3>3. UPDATE</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">UPDATE</span> table_name\r\n<span class=\"hljs-keyword\">SET</span> column1 <span class=\"hljs-operator\">=</span> value1, column2 <span class=\"hljs-operator\">=</span> value2, ...\r\n<span class=\"hljs-keyword\">WHERE</span> <span class=\"hljs-keyword\">condition</span>; </code></pre>\r\n<h3>Example</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">UPDATE</span> EMPLOYEE <span class=\"hljs-keyword\">SET</span> dept <span class=\"hljs-operator\">=</span> <span class=\"hljs-string\">\'Sales\'</span> <span class=\"hljs-keyword\">WHERE</span> empId<span class=\"hljs-operator\">=</span><span class=\"hljs-string\">\'0001\'</span>; </code></pre>\r\n<h3>4. DELETE</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">DELETE</span> <span class=\"hljs-keyword\">FROM</span> table_name <span class=\"hljs-keyword\">where</span> <span class=\"hljs-keyword\">condition</span>;</code></pre>\r\n<h3>Example</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">DELETE</span> <span class=\"hljs-keyword\">from</span> EMPLOYEE <span class=\"hljs-keyword\">where</span> empId<span class=\"hljs-operator\">=</span><span class=\"hljs-string\">\'0001\'</span>; </code></pre>\r\n<h2>Indexes</h2>\r\n<h3>1. CREATE INDEX</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\">  <span class=\"hljs-keyword\">CREATE</span> INDEX index_name <span class=\"hljs-keyword\">on</span> table_name(column_name);</code></pre>\r\n<ul>\r\n<li>To Create Unique index:</li>\r\n</ul>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\">  <span class=\"hljs-keyword\">CREATE</span> <span class=\"hljs-keyword\">UNIQUE</span> INDEX index_name <span class=\"hljs-keyword\">on</span> table_name(column_name);</code></pre>\r\n<h3>2. DROP INDEX</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">DROP</span> INDEX index_name <span class=\"hljs-keyword\">ON</span> table_name;</code></pre>\r\n<h2>Views</h2>\r\n<h3>1. Create a View</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\">Creating a <span class=\"hljs-keyword\">View</span>:\r\n<span class=\"hljs-keyword\">CREATE</span> <span class=\"hljs-keyword\">VIEW</span> View_name <span class=\"hljs-keyword\">AS</span> \r\nQuery;</code></pre>\r\n<h3>2. How to call view</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">SELECT</span> <span class=\"hljs-operator\">*</span> <span class=\"hljs-keyword\">FROM</span> View_name;</code></pre>\r\n<h3>3. Altering a View</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">ALTER</span> <span class=\"hljs-keyword\">View</span> View_name <span class=\"hljs-keyword\">AS</span> \r\nQuery;</code></pre>\r\n<h3>4. Deleting a View</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">DROP</span> <span class=\"hljs-keyword\">VIEW</span> View_name;</code></pre>\r\n<h2>Triggers</h2>\r\n<h3>1. Create a Trigger</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">CREATE</span> <span class=\"hljs-keyword\">TRIGGER</span> trigger_name trigger_time trigger_event\r\n    <span class=\"hljs-keyword\">ON</span> tbl_name <span class=\"hljs-keyword\">FOR</span> <span class=\"hljs-keyword\">EACH</span> <span class=\"hljs-type\">ROW</span> [trigger_order] trigger_body\r\n<span class=\"hljs-comment\">/* where\r\ntrigger_time: { BEFORE | AFTER }\r\ntrigger_event: { INSERT | UPDATE | DELETE }\r\ntrigger_order: { FOLLOWS | PRECEDES } */</span></code></pre>\r\n<h3>2. Drop a Trigger</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">DROP</span> <span class=\"hljs-keyword\">TRIGGER</span> [IF <span class=\"hljs-keyword\">EXISTS</span>] trigger_name;</code></pre>\r\n<h2>Stored Procedures</h2>\r\n<h3>1. Create a Stored Procedure</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">CREATE</span> <span class=\"hljs-keyword\">PROCEDURE</span> sp_name(p1 datatype)\r\n<span class=\"hljs-keyword\">BEGIN</span>\r\n<span class=\"hljs-comment\">/*Stored procedure code*/</span>\r\n<span class=\"hljs-keyword\">END</span>;</code></pre>\r\n<h3>2. How to call Stored procedure</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">CALL</span> sp_name;</code></pre>\r\n<h3>3. How to delete stored procedure</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">DROP</span> <span class=\"hljs-keyword\">PROCEDURE</span> sp_name;</code></pre>\r\n<h2>Joins</h2>\r\n<h3>1. INNER JOIN</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">SELECT</span> <span class=\"hljs-operator\">*</span> <span class=\"hljs-keyword\">FROM</span> TABLE1 <span class=\"hljs-keyword\">INNER</span> <span class=\"hljs-keyword\">JOIN</span> TABLE2 <span class=\"hljs-keyword\">where</span> <span class=\"hljs-keyword\">condition</span>;</code></pre>\r\n<h3>2. LEFT JOIN</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">SELECT</span> <span class=\"hljs-operator\">*</span> <span class=\"hljs-keyword\">FROM</span> TABLE1 <span class=\"hljs-keyword\">LEFT</span> <span class=\"hljs-keyword\">JOIN</span> TABLE2 <span class=\"hljs-keyword\">ON</span> <span class=\"hljs-keyword\">condition</span>;</code></pre>\r\n<h3>3. RIGHT JOIN</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">SELECT</span> <span class=\"hljs-operator\">*</span> <span class=\"hljs-keyword\">FROM</span> TABLE1 <span class=\"hljs-keyword\">RIGHT</span> <span class=\"hljs-keyword\">JOIN</span> TABLE2 <span class=\"hljs-keyword\">ON</span> <span class=\"hljs-keyword\">condition</span>;</code></pre>\r\n<h3>4. CROSS JOIN</h3>\r\n<pre class=\"jss346\"><code class=\"language-sql hljs\"><span class=\"hljs-keyword\">SELECT</span> select_list <span class=\"hljs-keyword\">from</span> TABLE1 <span class=\"hljs-keyword\">CROSS</span> <span class=\"hljs-keyword\">JOIN</span> TABLE2;</code></pre>', '1733333504.png', 'active', '2024-12-04 12:01:44', '2024-12-04 12:01:44'),
(13, 'Basics of javascript', 7, '<h1>About Javascript</h1>\r\n<p>Javascript(JS) is a object-oriented programming language which adhere to ECMA Script Standards. Javascript is required to design the behaviour of the web pages.</p>\r\n<h1>Key Features</h1>\r\n<ul>\r\n<li>Open-source</li>\r\n<li>Just-in-time compiled language</li>\r\n<li>Embedded along with HTML and makes web pages alive</li>\r\n<li>Originally named as LiveScript.</li>\r\n<li>Executable in both browser and server which has Javascript engines like V8(chrome), SpiderMonkey(Firefox) etc.</li>\r\n</ul>\r\n<h1>Syntax help</h1>\r\n<h2>STDIN Example</h2>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">var</span> readline = <span class=\"hljs-built_in\">require</span>(<span class=\"hljs-string\">\'readline\'</span>);\r\n<span class=\"hljs-keyword\">var</span> rl = readline.createInterface({\r\n  <span class=\"hljs-attr\">input</span>: process.stdin,\r\n  <span class=\"hljs-attr\">output</span>: process.stdout,\r\n  <span class=\"hljs-attr\">terminal</span>: <span class=\"hljs-literal\">false</span>\r\n});\r\n\r\nrl.on(<span class=\"hljs-string\">\'line\'</span>, <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>(<span class=\"hljs-params\">line</span>)</span>{\r\n    <span class=\"hljs-built_in\">console</span>.log(<span class=\"hljs-string\">\"Hello, \"</span> + line);\r\n});</code></pre>\r\n<h2>variable declaration</h2>\r\n<table>\r\n<thead>\r\n<tr>\r\n<th>Keyword</th>\r\n<th>Description</th>\r\n<th>Scope</th>\r\n</tr>\r\n</thead>\r\n<tbody>\r\n<tr>\r\n<td>var</td>\r\n<td>Var is used to declare variables(old way of declaring variables)</td>\r\n<td>Function or global scope</td>\r\n</tr>\r\n<tr>\r\n<td>let</td>\r\n<td>let is also used to declare variables(new way)</td>\r\n<td>Global or block Scope</td>\r\n</tr>\r\n<tr>\r\n<td>const</td>\r\n<td>const is used to declare const values. Once the value is assigned, it can not be modified</td>\r\n<td>Global or block Scope</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Backtick Strings</h2>\r\n<h3>Interpolation</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">let</span> greetings = <span class=\"hljs-string\">`Hello <span class=\"hljs-subst\">${name}</span>`</span></code></pre>\r\n<h3>Multi line Strings</h3>\r\n<pre class=\"jss292\"><code class=\"plaintext hljs\">const msg = `\r\nhello\r\nworld!\r\n`</code></pre>\r\n<h2>Arrays</h2>\r\n<p>An array is a collection of items or values.</p>\r\n<h3>Syntax:</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">let</span> arrayName = [value1, value2,..etc];\r\n<span class=\"hljs-comment\">// or</span>\r\n<span class=\"hljs-keyword\">let</span> arrayName = <span class=\"hljs-keyword\">new</span> <span class=\"hljs-built_in\">Array</span>(<span class=\"hljs-string\">\"value1\"</span>,<span class=\"hljs-string\">\"value2\"</span>,..etc);</code></pre>\r\n<h3>Example:</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">let</span> mobiles = [<span class=\"hljs-string\">\"iPhone\"</span>, <span class=\"hljs-string\">\"Samsung\"</span>, <span class=\"hljs-string\">\"Pixel\"</span>];\r\n\r\n<span class=\"hljs-comment\">// accessing an array</span>\r\n<span class=\"hljs-built_in\">console</span>.log(mobiles[<span class=\"hljs-number\">0</span>]);\r\n\r\n<span class=\"hljs-comment\">// changing an array element</span>\r\nmobiles[<span class=\"hljs-number\">3</span>] = <span class=\"hljs-string\">\"Nokia\"</span>;</code></pre>\r\n<h2>Arrow functions</h2>\r\n<p>Arrow Functions helps developers to write code in concise way, it&rsquo;s introduced in ES6.<br>Arrow functions can be written in multiple ways. Below are couple of ways to use arrow function but it can be written in many other ways as well.</p>\r\n<h3>Syntax:</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\">() =&gt; expression</code></pre>\r\n<h3>Example:</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">const</span> numbers = [<span class=\"hljs-number\">0</span>, <span class=\"hljs-number\">1</span>, <span class=\"hljs-number\">2</span>, <span class=\"hljs-number\">3</span>, <span class=\"hljs-number\">4</span>, <span class=\"hljs-number\">5</span>, <span class=\"hljs-number\">6</span>, <span class=\"hljs-number\">7</span>, <span class=\"hljs-number\">8</span>, <span class=\"hljs-number\">9</span>]\r\n<span class=\"hljs-keyword\">const</span> squaresOfEvenNumbers = numbers.filter(<span class=\"hljs-function\"><span class=\"hljs-params\">ele</span> =&gt;</span> ele % <span class=\"hljs-number\">2</span> == <span class=\"hljs-number\">0</span>)\r\n                                    .map(<span class=\"hljs-function\"><span class=\"hljs-params\">ele</span> =&gt;</span> ele ** <span class=\"hljs-number\">2</span>);\r\n<span class=\"hljs-built_in\">console</span>.log(squaresOfEvenNumbers);</code></pre>\r\n<h2>De-structuring</h2>\r\n<h3>Arrays</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">let</span> [firstName, lastName] = [<span class=\"hljs-string\">\'Foo\'</span>, <span class=\"hljs-string\">\'Bar\'</span>]</code></pre>\r\n<h3>Objects</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">let</span> {firstName, lastName} = {\r\n  <span class=\"hljs-attr\">firstName</span>: <span class=\"hljs-string\">\'Foo\'</span>,\r\n  <span class=\"hljs-attr\">lastName</span>: <span class=\"hljs-string\">\'Bar\'</span>\r\n}</code></pre>\r\n<h3>rest(...) operator</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"> <span class=\"hljs-keyword\">const</span> {\r\n    title,\r\n    firstName,\r\n    lastName,\r\n    ...rest\r\n  } = record;</code></pre>\r\n<h3>Spread(...) operator</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-comment\">//Object spread</span>\r\n<span class=\"hljs-keyword\">const</span> post = {\r\n  ...options,\r\n  <span class=\"hljs-attr\">type</span>: <span class=\"hljs-string\">\"new\"</span>\r\n}\r\n<span class=\"hljs-comment\">//array spread</span>\r\n<span class=\"hljs-keyword\">const</span> users = [\r\n  ...adminUsers,\r\n  ...normalUsers\r\n]</code></pre>\r\n<h2>Functions</h2>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">greetings</span>(<span class=\"hljs-params\">{ name = <span class=\"hljs-string\">\'Foo\'</span> } = {}</span>) </span>{ <span class=\"hljs-comment\">//Defaulting name to Foo</span>\r\n  <span class=\"hljs-built_in\">console</span>.log(<span class=\"hljs-string\">`Hello <span class=\"hljs-subst\">${name}</span>!`</span>);\r\n}\r\n \r\ngreet() <span class=\"hljs-comment\">// Hello Foo</span>\r\ngreet({ <span class=\"hljs-attr\">name</span>: <span class=\"hljs-string\">\'Bar\'</span> }) <span class=\"hljs-comment\">// Hi Bar</span></code></pre>\r\n<h2>Loops</h2>\r\n<h3>1. If:</h3>\r\n<p>IF is used to execute a block of code based on a condition.</p>\r\n<h3>Syntax</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">if</span>(condition){\r\n    <span class=\"hljs-comment\">// code</span>\r\n}</code></pre>\r\n<h3>2. If-Else:</h3>\r\n<p>Else part is used to execute the block of code when the condition fails.</p>\r\n<h3>Syntax</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">if</span>(condition){\r\n    <span class=\"hljs-comment\">// code</span>\r\n} <span class=\"hljs-keyword\">else</span> {\r\n    <span class=\"hljs-comment\">// code</span>\r\n}</code></pre>\r\n<h3>3. Switch:</h3>\r\n<p>Switch is used to replace nested If-Else statements.</p>\r\n<h3>Syntax</h3>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">switch</span>(condition){\r\n    <span class=\"hljs-keyword\">case</span> <span class=\"hljs-string\">\'value1\'</span> :\r\n        <span class=\"hljs-comment\">//code</span>\r\n        [<span class=\"hljs-keyword\">break</span>;]\r\n    <span class=\"hljs-keyword\">case</span> <span class=\"hljs-string\">\'value2\'</span> :\r\n        <span class=\"hljs-comment\">//code</span>\r\n        [<span class=\"hljs-keyword\">break</span>;]\r\n    .......\r\n    <span class=\"hljs-attr\">default</span> :\r\n        <span class=\"hljs-comment\">//code</span>\r\n        [<span class=\"hljs-keyword\">break</span>;]\r\n}</code></pre>\r\n<h3>4. For</h3>\r\n<p>For loop is used to iterate a set of statements based on a condition.</p>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">for</span>(Initialization; Condition; Increment/decrement){  \r\n<span class=\"hljs-comment\">//code  </span>\r\n} </code></pre>\r\n<h3>5. While</h3>\r\n<p>While is also used to iterate a set of statements based on a condition. Usually while is preferred when number of iterations are not known in advance.</p>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">while</span> (condition) {  \r\n  <span class=\"hljs-comment\">// code </span>\r\n}  </code></pre>\r\n<h3>6. Do-While</h3>\r\n<p>Do-while is also used to iterate a set of statements based on a condition. It is mostly used when you need to execute the statements atleast once.</p>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">do</span> {  \r\n  <span class=\"hljs-comment\">// code </span>\r\n} <span class=\"hljs-keyword\">while</span> (condition); </code></pre>\r\n<h2>Classes</h2>\r\n<p>ES6 introduced classes along with OOPS concepts in JS. Class is similar to a function which you can think like kind of template which will get called when ever you initialize class.</p>\r\n<h2>Syntax:</h2>\r\n<pre class=\"jss292\"><code class=\"language-javascript hljs\"><span class=\"hljs-class\"><span class=\"hljs-keyword\">class</span> <span class=\"hljs-title\">className</span> </span>{\r\n  <span class=\"hljs-function\"><span class=\"hljs-title\">constructor</span>()</span> { ... } <span class=\"hljs-comment\">//Mandatory Class method</span>\r\n  <span class=\"hljs-function\"><span class=\"hljs-title\">method1</span>()</span> { ... }\r\n  <span class=\"hljs-function\"><span class=\"hljs-title\">method2</span>()</span> { ... }\r\n  ...\r\n}</code></pre>', '1734621097.png', 'active', '2024-12-19 09:41:37', '2024-12-19 09:47:36'),
(14, 'Javascript Functions', 7, '<div class=\"md-view oc-theme-light \">\r\n<p>A function is a block of code which can be re-used multiple times. Beauty of functions is that they allow the code to call the functions multiple times and hence avoiding repetition of code.</p>\r\n<h2>How to declare a function</h2>\r\n<h3>Syntax</h3>\r\n<pre class=\"jss653\"><code class=\"language-javacript\">function function-name(parameters){ // here parameters are optional\r\n    //code\r\n}</code></pre>\r\n<h2>How to call a function</h2>\r\n<h3>Syntax</h3>\r\n<pre class=\"jss653\"><code class=\"language-javascript hljs\"><span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>-<span class=\"hljs-title\">name</span>(<span class=\"hljs-params\">parameters</span>)</span>;</code></pre>\r\n<h2>Examples</h2>\r\n<h3>1. Function with out parameters</h3>\r\n<pre class=\"jss653\"><code class=\"language-javascript hljs\"><span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">greetings</span>()</span>{\r\n    <span class=\"hljs-built_in\">console</span>.log(<span class=\"hljs-string\">\'<span class=\"hljs-comment\">AakashAp</span>\'</span>);\r\n}\r\ngreetings();\r\ngreetings(); <span class=\"hljs-comment\">// You can call the function as many times you want</span></code></pre>\r\n<h3>check the result&nbsp;<a href=\"https://onecompiler.com/javascript/3vhq6gvf4\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">here</a></h3>\r\n<h3>2. Function with parameters</h3>\r\n<pre class=\"jss653\"><code class=\"language-javascript hljs\"><span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">greetings</span>(<span class=\"hljs-params\">name</span>)</span>{\r\n    <span class=\"hljs-built_in\">console</span>.log(<span class=\"hljs-string\">\'Hi \'</span> + name + <span class=\"hljs-string\">\'! <span class=\"hljs-comment\">AakashAp</span>\'</span>);\r\n}\r\ngreetings(<span class=\"hljs-string\">\'foo\'</span>);\r\ngreetings(<span class=\"hljs-string\">\'bar\'</span>); </code></pre>\r\n<h3>check the result&nbsp;<a href=\"https://onecompiler.com/javascript/3vhq64g82\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">here</a></h3>\r\n<h3>3. Function with parameters having default values</h3>\r\n<p>If parameters are not provided while calling the function, then it\'s value becomes&nbsp;<code>undefined</code>. If you want to default the parameter\'s values to some default text, then you can do this way.</p>\r\n<h4>Case : 1</h4>\r\n<p>If you are not providing any parameter then it\'s value becomes undefined.</p>\r\n<pre class=\"jss653\"><code class=\"language-javascript hljs\"><span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">setName</span>(<span class=\"hljs-params\">name</span>)</span>{ \r\n	<span class=\"hljs-keyword\">return</span> name;\r\n};\r\n<span class=\"hljs-built_in\">console</span>.log(setName()); <span class=\"hljs-comment\">// undefined</span>\r\n<span class=\"hljs-built_in\">console</span>.log(setName(<span class=\"hljs-string\">\"foo\"</span>)); <span class=\"hljs-comment\">// foo</span></code></pre>\r\n<h4>Case : 2</h4>\r\n<p>If you want to default a value to a parameter, here is how you can do it.</p>\r\n<pre class=\"jss653\"><code class=\"language-javascript hljs\"><span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">setName</span>(<span class=\"hljs-params\">name = <span class=\"hljs-string\">\"NA\"</span></span>)</span>{ <span class=\"hljs-comment\">// defaulting values to parameters</span>\r\n	<span class=\"hljs-keyword\">return</span> name;\r\n};\r\n<span class=\"hljs-built_in\">console</span>.log(setName()); <span class=\"hljs-comment\">// NA</span>\r\n<span class=\"hljs-built_in\">console</span>.log(setName(<span class=\"hljs-string\">\"foo\"</span>)); <span class=\"hljs-comment\">// foo</span></code></pre>\r\n<h4>Case : 3</h4>\r\n<p>Below example helps you understand the difference between parameter value defaults and object literal defaults.</p>\r\n<pre class=\"jss653\"><code class=\"language-javascript hljs\">func = <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span>(<span class=\"hljs-params\">{x = <span class=\"hljs-number\">10</span>,y = <span class=\"hljs-number\">11</span>,z = <span class=\"hljs-number\">12</span>} = {x:<span class=\"hljs-number\">1</span>,y:<span class=\"hljs-number\">2</span>,z:<span class=\"hljs-number\">3</span>}</span>) </span>{\r\n    <span class=\"hljs-built_in\">console</span>.log(x,y,z);\r\n};\r\n\r\nfunc(); <span class=\"hljs-comment\">//1 2 3  (hits the object literal default)</span>\r\nfunc({}); <span class=\"hljs-comment\">//10 11 12   (hits the value defaults)</span></code></pre>\r\n<h3>Check the result&nbsp;<a href=\"https://onecompiler.com/javascript/3vhq7skve\" target=\"_blank\" rel=\"noopener noreferrer nofollow\">here</a></h3>\r\n<h2>4. Function Expressions</h2>\r\n<p>You can assign function to a variable explictly. In Javascript, function is a value and hence you can assign it to a variable like any other values.</p>\r\n<h3>Examples</h3>\r\n<pre class=\"jss653\"><code class=\"language-javascript hljs\"><span class=\"hljs-keyword\">let</span> message = <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> () </span>{\r\n    <span class=\"hljs-built_in\">console</span>.log(<span class=\"hljs-string\">\'<span class=\"hljs-comment\">AakashAp</span>\'</span>);\r\n}</code></pre>\r\n<p>You can copy function to an another variable.</p>\r\n<pre class=\"jss653\"><code class=\"language-javascript hljs\"><span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">greetings</span>() </span>{\r\n    <span class=\"hljs-built_in\">console</span>.log(<span class=\"hljs-string\">\'<span class=\"hljs-comment\">AakashAp</span>\'</span>);\r\n}\r\n<span class=\"hljs-keyword\">let</span> message = greetings; <span class=\"hljs-comment\">// if there are parameters to the function then you should specify greetings();</span>\r\n\r\nmessage(); <span class=\"hljs-comment\">// AakashAp</span>\r\ngreetings(); <span class=\"hljs-comment\">//AakashAp</span></code></pre>\r\n</div>', '1734621442.jpg', 'active', '2024-12-19 09:47:22', '2024-12-19 09:48:06'),
(15, 'Javascript in HTML', 7, '<p>Javascript is used to provide more interactivity to HTML pages.</p>\r\n<p>You can define script in the HTML code itself or refer the external javascript code.</p>\r\n<p><code>&lt;script&gt;</code>&nbsp;element is used to define javascript statements in HTML code.&nbsp;<code>src</code>&nbsp;attribute is used to point to an external script file.</p>\r\n<h3>Internal script</h3>\r\n<pre class=\"jss691\"><code class=\"language-html hljs xml\"><span class=\"hljs-meta\">&lt;!DOCTYPE <span class=\"hljs-meta-keyword\">html</span>&gt;</span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">html</span>&gt;</span>\r\n  <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">head</span>&gt;</span>\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">title</span>&gt;</span>Hello World!<span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">title</span>&gt;</span>\r\n  <span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">head</span>&gt;</span>\r\n  <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">body</span>&gt;</span>\r\n      <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">button</span> <span class=\"hljs-attr\">type</span> = <span class=\"hljs-string\">\"button\"</span> <span class=\"hljs-attr\">onclick</span> = <span class=\"hljs-string\">\"showTime()\"</span>&gt;</span>Display Time <span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">button</span>&gt;</span>\r\n      <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">p</span> <span class=\"hljs-attr\">id</span>=<span class=\"hljs-string\">\"currentTime\"</span>&gt;</span><span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">p</span>&gt;</span>\r\n      \r\n      <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">type</span> = <span class=\"hljs-string\">\"text/JavaScript\"</span>&gt;</span><span class=\"javascript\">\r\n          <span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">showTime</span>() </span>{\r\n	          <span class=\"hljs-built_in\">document</span>.getElementById(<span class=\"hljs-string\">\'currentTime\'</span>).innerHTML = <span class=\"hljs-keyword\">new</span> <span class=\"hljs-built_in\">Date</span>().toUTCString();\r\n          }\r\n      </span><span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">script</span>&gt;</span>\r\n  <span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">body</span>&gt;</span>\r\n<span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">html</span>&gt;</span></code></pre>\r\n<h3>External script</h3>\r\n<pre class=\"jss691\"><code class=\"language-html hljs xml\"><span class=\"hljs-meta\">&lt;!DOCTYPE <span class=\"hljs-meta-keyword\">html</span>&gt;</span>\r\n<span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">html</span>&gt;</span>\r\n  <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">head</span>&gt;</span>\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">title</span>&gt;</span>Hello World!<span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">title</span>&gt;</span>\r\n    <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">link</span> <span class=\"hljs-attr\">rel</span>=<span class=\"hljs-string\">\"stylesheet\"</span> <span class=\"hljs-attr\">href</span>=<span class=\"hljs-string\">\"styles.css\"</span> /&gt;</span>\r\n  <span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">head</span>&gt;</span>\r\n  <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">body</span>&gt;</span>\r\n      <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">h1</span> <span class=\"hljs-attr\">class</span>=<span class=\"hljs-string\">\"title\"</span>&gt;</span>Hello World! <span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">h1</span>&gt;</span>\r\n      <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">p</span> <span class=\"hljs-attr\">id</span>=<span class=\"hljs-string\">\"currentTime\"</span>&gt;</span><span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">p</span>&gt;</span>\r\n      <span class=\"hljs-tag\">&lt;<span class=\"hljs-name\">script</span> <span class=\"hljs-attr\">src</span>=<span class=\"hljs-string\">\"script.js\"</span>&gt;</span><span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">script</span>&gt;</span>\r\n  <span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">body</span>&gt;</span>\r\n<span class=\"hljs-tag\">&lt;/<span class=\"hljs-name\">html</span>&gt;</span></code></pre>\r\n<h3>script.js</h3>\r\n<pre class=\"jss691\"><code class=\"language-js hljs javascript\"><span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> <span class=\"hljs-title\">showTime</span>() </span>{\r\n	<span class=\"hljs-built_in\">document</span>.getElementById(<span class=\"hljs-string\">\'currentTime\'</span>).innerHTML = <span class=\"hljs-keyword\">new</span> <span class=\"hljs-built_in\">Date</span>().toUTCString();\r\n}\r\nshowTime();\r\n<span class=\"hljs-built_in\">setInterval</span>(<span class=\"hljs-function\"><span class=\"hljs-keyword\">function</span> () </span>{\r\n	showTime();\r\n}, <span class=\"hljs-number\">1000</span>);</code></pre>', '1734621640.png', 'active', '2024-12-19 09:50:40', '2024-12-19 09:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Payment Methods', 'Payment Methods', 'inactive', '2024-11-16 02:54:04', '2024-12-19 09:43:12'),
(3, 'Rest APIs', 'Rest APIs', 'inactive', '2024-11-16 02:54:43', '2024-12-19 09:43:11'),
(6, 'My SQL Database', 'My SQL Database', 'active', '2024-12-04 11:57:35', '2024-12-04 11:57:35'),
(7, 'Javascript', 'Javascript', 'active', '2024-12-19 09:43:05', '2024-12-19 09:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `message`, `file_name`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL, 1, '2024-12-06 12:38:03', '2024-12-06 13:03:59'),
(2, 1, 4, NULL, NULL, 1, '2024-12-06 12:43:13', '2024-12-06 13:03:59'),
(3, 1, 4, NULL, '[\"1733508832-profile2.jpg\"]', 1, '2024-12-06 12:43:52', '2024-12-06 13:03:59'),
(4, 1, 4, 'hii', NULL, 1, '2024-12-06 12:51:26', '2024-12-06 13:03:59'),
(5, 4, 1, 'hello', NULL, 1, '2024-12-06 12:53:52', '2024-12-06 12:54:10'),
(6, 1, 4, 'hll', NULL, 1, '2024-12-06 12:54:19', '2024-12-06 13:03:59'),
(7, 4, 1, NULL, NULL, 1, '2024-12-06 12:54:37', '2024-12-06 12:55:10'),
(8, 4, 1, 'hii', NULL, 1, '2024-12-06 12:56:22', '2024-12-06 12:57:14'),
(9, 4, 1, 'hello', NULL, 1, '2024-12-06 12:57:04', '2024-12-06 12:57:14'),
(10, 4, 1, 'hello', NULL, 1, '2024-12-06 12:57:08', '2024-12-06 12:57:14'),
(11, 1, 4, 'hii', NULL, 1, '2024-12-06 12:57:19', '2024-12-06 13:03:59'),
(12, 4, 1, 'hi', NULL, 1, '2024-12-06 12:58:11', '2024-12-06 12:58:23'),
(13, 4, 1, 'hii', NULL, 1, '2024-12-06 12:59:12', '2024-12-06 12:59:41'),
(14, 4, 1, 'hi', NULL, 1, '2024-12-06 13:04:03', '2024-12-06 13:04:11'),
(15, 4, 1, 'hi', NULL, 1, '2024-12-06 13:04:46', '2024-12-06 13:05:30'),
(16, 4, 1, 'hello', NULL, 1, '2024-12-06 13:04:51', '2024-12-06 13:05:30'),
(17, 1, 4, 'kem chhio', NULL, 1, '2024-12-06 13:05:48', '2024-12-06 13:09:29'),
(18, 4, 1, 'hi', NULL, 1, '2024-12-06 13:07:58', '2024-12-06 13:08:02'),
(19, 4, 1, 'hello', NULL, 1, '2024-12-06 13:09:37', '2024-12-06 13:09:40'),
(20, 1, 4, 'hii', NULL, 1, '2024-12-06 13:09:45', '2024-12-06 13:09:57'),
(21, 4, 1, 'hi', NULL, 1, '2024-12-06 13:10:49', '2024-12-06 13:10:51'),
(22, 1, 4, 'hi', NULL, 1, '2024-12-06 13:10:56', '2024-12-06 13:11:58'),
(23, 4, 1, '=', NULL, 1, '2024-12-06 13:11:07', '2024-12-06 13:11:27'),
(24, 4, 1, 'hi', NULL, 1, '2024-12-06 13:12:05', '2024-12-06 13:12:11'),
(25, 1, 4, 'hii', NULL, 1, '2024-12-06 13:12:13', '2024-12-06 13:12:15'),
(26, 4, 1, '', NULL, 1, '2024-12-06 13:12:48', '2024-12-06 13:13:11'),
(27, 1, 4, 'hi', NULL, 1, '2024-12-06 13:15:56', '2024-12-06 13:16:21'),
(28, 4, 1, 'hii', NULL, 1, '2024-12-06 13:16:26', '2024-12-06 13:16:29'),
(29, 1, 4, 'hi', NULL, 1, '2024-12-06 13:19:09', '2024-12-06 13:20:24'),
(30, 1, 4, 'hii', NULL, 1, '2024-12-06 13:20:47', '2024-12-06 13:21:20'),
(31, 1, 4, 'hello', NULL, 1, '2024-12-06 13:20:52', '2024-12-06 13:21:20'),
(32, 1, 4, 'hi', NULL, 1, '2024-12-06 13:22:03', '2024-12-06 13:23:10'),
(33, 1, 4, 'hi', NULL, 1, '2024-12-06 13:24:06', '2024-12-06 13:25:53'),
(34, 1, 4, 'hii', NULL, 1, '2024-12-06 13:24:14', '2024-12-06 13:25:53'),
(35, 1, 4, 'hiii', NULL, 1, '2024-12-06 13:24:18', '2024-12-06 13:25:53'),
(36, 1, 4, 'hello', NULL, 1, '2024-12-06 13:24:23', '2024-12-06 13:25:53'),
(37, 1, 4, 'hii', NULL, 1, '2024-12-06 13:24:52', '2024-12-06 13:25:53'),
(38, 1, 4, 'hello', NULL, 1, '2024-12-06 13:24:59', '2024-12-06 13:25:53'),
(39, 4, 1, 'hii', NULL, 1, '2024-12-06 13:27:10', '2024-12-06 13:27:13'),
(40, 1, 4, 'hi', NULL, 1, '2024-12-06 13:36:54', '2024-12-06 13:37:22'),
(41, 1, 4, 'hello', NULL, 1, '2024-12-06 13:36:58', '2024-12-06 13:37:22'),
(42, 1, 4, 'kem chho', NULL, 1, '2024-12-06 13:37:07', '2024-12-06 13:37:22'),
(43, 1, 4, 'nothing heppaned', NULL, 1, '2024-12-06 13:37:18', '2024-12-06 13:37:22'),
(44, 4, 1, 'vxvxvsd smfslsdls fmslfsjlor slfjksdljdslg sjsdlgjerot  mdklgrkltjerl jedtledj ldgm\'yreykrdldk gldgkdrl ', NULL, 1, '2024-12-06 13:40:46', '2024-12-07 01:38:36'),
(45, 4, 1, 'hii', NULL, 1, '2024-12-06 13:45:17', '2024-12-07 01:38:36'),
(46, 4, 1, 'hello', NULL, 1, '2024-12-06 13:45:23', '2024-12-07 01:38:36'),
(47, 4, 1, 'hi', NULL, 1, '2024-12-06 13:52:10', '2024-12-07 01:38:36'),
(48, 4, 1, 'hi', NULL, 1, '2024-12-06 13:52:46', '2024-12-07 01:38:36'),
(49, 4, 1, 'hello', NULL, 1, '2024-12-06 13:52:52', '2024-12-07 01:38:36'),
(50, 4, 1, 'hii', NULL, 1, '2024-12-06 13:57:48', '2024-12-07 01:38:36'),
(51, 4, 1, 'hii', NULL, 1, '2024-12-06 14:00:54', '2024-12-07 01:38:36'),
(52, 4, 1, 'hi', NULL, 1, '2024-12-07 01:36:43', '2024-12-07 01:38:36'),
(53, 1, 4, 'hi', NULL, 1, '2024-12-07 01:38:44', '2024-12-07 01:38:46'),
(54, 4, 1, 'hii', NULL, 1, '2024-12-07 02:45:13', '2024-12-07 02:45:19'),
(55, 4, 1, 'hi', NULL, 1, '2024-12-07 02:45:22', '2024-12-07 02:45:23'),
(56, 1, 4, 'hii', NULL, 1, '2024-12-07 02:45:28', '2024-12-07 02:45:31'),
(57, 1, 4, 'hii', NULL, 1, '2024-12-07 03:00:03', '2024-12-07 03:00:37'),
(58, 4, 1, 'hi', NULL, 1, '2024-12-07 03:00:39', '2024-12-07 03:00:48'),
(59, 1, 4, 'hi', NULL, 1, '2024-12-07 03:00:53', '2024-12-07 03:00:56'),
(60, 1, 4, 'hi', NULL, 1, '2024-12-07 03:01:17', '2024-12-07 03:01:22'),
(61, 1, 4, 'hello', NULL, 1, '2024-12-07 03:01:21', '2024-12-07 03:01:22'),
(62, 1, 4, 'hi', NULL, 1, '2024-12-07 03:05:37', '2024-12-07 03:06:01'),
(63, 1, 4, 'hi', NULL, 1, '2024-12-07 03:06:06', '2024-12-07 03:06:07'),
(64, 4, 1, 'hi', NULL, 1, '2024-12-07 03:06:13', '2024-12-07 03:06:15'),
(65, 1, 4, 'hi', NULL, 1, '2024-12-07 03:08:52', '2024-12-07 03:09:00'),
(66, 4, 1, 'hi', NULL, 1, '2024-12-07 03:09:02', '2024-12-07 03:09:06'),
(67, 1, 4, 'hi', NULL, 1, '2024-12-07 03:09:32', '2024-12-07 03:09:34'),
(68, 1, 4, 'hii', NULL, 1, '2024-12-07 03:11:16', '2024-12-07 03:11:17'),
(69, 4, 1, 'hi', NULL, 1, '2024-12-07 03:11:24', '2024-12-07 03:11:27'),
(70, 1, 4, 'hello', NULL, 1, '2024-12-07 03:13:32', '2024-12-07 03:14:00'),
(71, 1, 4, 'hii', NULL, 1, '2024-12-07 03:13:55', '2024-12-07 03:14:00'),
(72, 4, 1, 'hii', NULL, 1, '2024-12-07 03:14:02', '2024-12-07 03:14:05'),
(73, 4, 1, 'hi', NULL, 1, '2024-12-07 03:16:19', '2024-12-07 03:16:20'),
(74, 4, 1, 'hi', NULL, 1, '2024-12-07 03:16:26', '2024-12-07 03:16:27'),
(75, 4, 1, 'hi', NULL, 1, '2024-12-07 03:17:35', '2024-12-07 03:17:37'),
(76, 1, 4, NULL, NULL, 1, '2024-12-07 03:19:57', '2024-12-07 03:19:57'),
(77, 1, 4, NULL, NULL, 1, '2024-12-07 03:19:57', '2024-12-07 03:19:57'),
(78, 1, 4, NULL, NULL, 1, '2024-12-07 03:19:59', '2024-12-07 03:20:00'),
(79, 1, 4, NULL, NULL, 1, '2024-12-07 03:19:59', '2024-12-07 03:20:00'),
(80, 1, 4, NULL, NULL, 1, '2024-12-07 03:20:00', '2024-12-07 03:20:00'),
(81, 1, 4, NULL, NULL, 1, '2024-12-07 03:20:00', '2024-12-07 03:20:00'),
(82, 1, 4, NULL, NULL, 1, '2024-12-07 03:20:01', '2024-12-07 03:20:03'),
(83, 1, 4, NULL, NULL, 1, '2024-12-07 03:20:01', '2024-12-07 03:20:03'),
(84, 1, 4, NULL, NULL, 1, '2024-12-07 03:20:04', '2024-12-07 03:20:06'),
(85, 1, 4, NULL, NULL, 1, '2024-12-07 03:20:04', '2024-12-07 03:20:06'),
(86, 1, 4, 'hi', NULL, 1, '2024-12-07 03:20:34', '2024-12-07 03:20:35'),
(87, 4, 1, 'hi', NULL, 1, '2024-12-07 03:20:39', '2024-12-07 03:20:39'),
(88, 4, 1, 'hello', NULL, 1, '2024-12-07 03:20:47', '2024-12-07 03:20:47'),
(89, 4, 1, 'hi', NULL, 1, '2024-12-07 03:22:43', '2024-12-07 03:22:45'),
(90, 4, 1, 'hi\'', NULL, 1, '2024-12-07 03:23:33', '2024-12-07 03:23:34'),
(91, 1, 4, 'hi', NULL, 1, '2024-12-07 03:25:58', '2024-12-07 03:26:12'),
(92, 4, 1, 'hi', NULL, 1, '2024-12-07 03:26:14', '2024-12-07 03:26:16'),
(93, 4, 1, 'hii', NULL, 1, '2024-12-07 03:26:57', '2024-12-07 03:26:59'),
(94, 4, 1, 'hi', NULL, 1, '2024-12-07 03:28:19', '2024-12-07 03:28:19'),
(95, 1, 4, 'hi', NULL, 1, '2024-12-07 03:30:30', '2024-12-07 03:30:36'),
(96, 4, 1, 'hi', NULL, 1, '2024-12-07 03:30:38', '2024-12-07 03:30:40'),
(97, 4, 1, 'hi', NULL, 1, '2024-12-07 03:32:18', '2024-12-07 03:32:20'),
(98, 4, 1, 'hi', NULL, 1, '2024-12-07 03:33:13', '2024-12-07 03:33:13'),
(99, 4, 1, 'hii', NULL, 1, '2024-12-07 03:42:08', '2024-12-07 03:42:09'),
(100, 4, 1, 'hi', NULL, 1, '2024-12-07 03:42:20', '2024-12-07 03:42:21'),
(101, 4, 1, 'hi', NULL, 1, '2024-12-07 03:42:48', '2024-12-07 03:42:49'),
(102, 4, 1, 'hii', NULL, 1, '2024-12-07 03:43:10', '2024-12-07 03:43:11'),
(103, 1, 4, 'hii', NULL, 1, '2024-12-07 03:43:51', '2024-12-07 03:43:56'),
(104, 4, 1, 'hi', NULL, 1, '2024-12-07 03:44:13', '2024-12-07 03:45:49'),
(105, 4, 1, 'hhi', NULL, 1, '2024-12-07 03:45:37', '2024-12-07 03:45:49'),
(106, 4, 1, 'hi', NULL, 1, '2024-12-07 03:46:13', '2024-12-07 03:46:33'),
(107, 4, 1, 'hi', NULL, 1, '2024-12-07 03:46:43', '2024-12-07 03:47:05'),
(108, 4, 1, 'hello', NULL, 1, '2024-12-07 03:46:47', '2024-12-07 03:47:05'),
(109, 4, 1, 'hello', NULL, 1, '2024-12-07 03:46:54', '2024-12-07 03:47:05'),
(110, 4, 1, 'hi', NULL, 0, '2024-12-19 09:54:14', '2024-12-19 09:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_me`
--

CREATE TABLE `contact_me` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_me`
--

INSERT INTO `contact_me` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Popu', 'prakratisingh12151107@gmail.com', 'A', 'A', '2024-10-30 18:30:12', '2024-10-30 18:30:12'),
(2, 'Jaydip', 'akashfablead01@gmail.com', 'A', 'A', '2024-10-31 01:02:48', '2024-10-31 01:02:48'),
(16, 'mylutajyju', 'qyjexehy@mailinator.com', 'Ipsum optio except', 'Quas blanditiis nemo', '2024-11-17 03:27:57', '2024-11-17 03:27:57'),
(17, 'raceq', 'gykekyvyk@mailinator.com', 'Dolores blanditiis q', 'Quibusdam occaecat u', '2024-11-17 03:27:58', '2024-11-17 03:27:58'),
(18, 'donymofyk', 'xenidoso@mailinator.com', 'Repellendus Enim do', 'Qui architecto conse', '2024-11-17 03:28:00', '2024-11-17 03:28:00'),
(19, 'nelajuc', 'poku@mailinator.com', 'Possimus et facilis', 'Dolores eligendi off', '2024-11-17 03:28:02', '2024-11-17 03:28:02'),
(20, 'cisykydux', 'biwetovym@mailinator.com', 'Eaque occaecat tenet', 'Provident adipisici', '2024-11-17 03:28:03', '2024-11-17 03:28:03'),
(21, 'wopobaqiqu', 'senyv@mailinator.com', 'Velit anim est eius ', 'Obcaecati voluptatib', '2024-11-17 13:38:53', '2024-11-17 13:38:53'),
(22, 'dygotugo', 'fopa@mailinator.com', 'Dolore neque laborum', 'Fugiat doloremque vo', '2024-11-18 10:01:16', '2024-11-18 10:01:16'),
(25, 'dohymome', 'zejydisudu@mailinator.com', 'A non laboriosam nu', 'Dolorum sunt quos u', '2024-11-28 10:43:29', '2024-11-28 10:43:29'),
(26, 'nyrugamu', 'tibymihu@mailinator.com', 'Eius porro pariatur', 'Id est laborum moll', '2024-12-01 03:41:49', '2024-12-01 03:41:49'),
(27, 'finesij', 'xemexosus@mailinator.com', 'Sit rem est dolore', 'Adipisicing occaecat', '2024-12-02 11:35:38', '2024-12-02 11:35:38'),
(28, 'jaydeep', 'saxok@mailinator.com', 'Consequatur impedit', 'Ullam quis ipsa qui', '2024-12-02 11:36:03', '2024-12-02 11:36:03'),
(29, 'xyz', 'xyz@gmail.com', 'xyz', 'zyz', '2024-12-19 09:57:31', '2024-12-19 09:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `subject`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Welcome', 'Welcome to my portfolio', '<table style=\"width: 100%; border-spacing: 0; background-color: #f5f5f5;\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><!-- Main Container -->\r\n<table style=\"max-width: 600px; width: 100%; background-color: rgb(255, 255, 255); border: 1px solid rgb(221, 221, 221); height: 487.6px;\"><!-- Header Section -->\r\n<tbody>\r\n<tr style=\"height: 98.4px;\">\r\n<td style=\"background-color: rgb(51, 51, 51); padding: 20px; text-align: center; height: 98.4px;\"><span style=\"font-size: 24pt; font-family: \'trebuchet ms\', geneva, sans-serif; color: rgb(186, 55, 42);\">AakashAP</span>\r\n<h1 style=\"color: #ffffff; font-size: 24px; margin: 10px 0;\">Thank You! ❤️</h1>\r\n</td>\r\n</tr>\r\n<!-- Body Section -->\r\n<tr style=\"height: 310.4px;\">\r\n<td style=\"padding: 20px; color: rgb(51, 51, 51); line-height: 1.6; text-align: left; height: 310.4px;\">\r\n<p style=\"font-size: 16px;\">Hi [username],</p>\r\n<p style=\"font-size: 16px;\">Thank you for visiting my portfolio and taking the time to reach out to me. I truly appreciate your interest in my work and the opportunity to connect.</p>\r\n<p style=\"font-size: 16px;\">If you have any additional questions or would like to collaborate on a project, feel free to reply to this email or contact me directly. I\'m excited to discuss how we can work together.<br>Visit my portfolio <span style=\"color: rgb(224, 62, 45);\"><a style=\"color: rgb(224, 62, 45);\" href=\"../\">Click Here</a></span></p>\r\n<p style=\"font-size: 16px;\">Best regards,<br>[admin]</p>\r\n</td>\r\n</tr>\r\n<!-- Footer Section -->\r\n<tr style=\"height: 78.8px;\">\r\n<td style=\"background-color: rgb(51, 51, 51); color: rgb(255, 255, 255); padding: 20px; text-align: center; height: 78.8px;\">\r\n<p style=\"margin: 0; font-size: 14px;\">Connect with me:</p>\r\n<p style=\"margin: 10px 0;\"><!-- Social Media Links --> <span style=\"color: rgb(53, 152, 219);\"><a style=\"color: rgb(53, 152, 219); text-decoration: none; margin-right: 15px;\" href=\"https://www.linkedin.com/in/aakashap\">LinkedIn</a></span> <span style=\"color: rgb(224, 62, 45);\"><a style=\"color: rgb(224, 62, 45); text-decoration: none; margin-right: 15px;\" href=\"https://github.com/AakashAp01\">GitHub</a></span> <span style=\"color: rgb(185, 106, 217);\"><a style=\"color: rgb(185, 106, 217); text-decoration: none;\" href=\"https://www.instagram.com/_aakash_ap_/profilecard/?igsh=MTEwaXB6Mnh4c3B6Yg==\">Instagram</a></span></p>\r\n<p style=\"margin: 0; font-size: 12px;\">&copy; 2024 AakashAp. All rights reserved.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'active', '2024-11-16 08:53:24', '2024-12-07 02:08:28'),
(2, 'New Blog Alert', 'New Blog', '<table style=\"width: 100%; border-spacing: 0; background-color: #f9f9f9; padding: 20px;\">\r\n<tbody>\r\n<tr>\r\n<td align=\"center\"><!-- Main Container -->\r\n<table style=\"max-width: 600px; width: 100%; background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; overflow: hidden;\"><!-- Header Section -->\r\n<tbody>\r\n<tr>\r\n<td style=\"background-color: #333333; text-align: center; padding: 30px;\">\r\n<h1 style=\"font-family: \'Trebuchet MS\', sans-serif; color: #ba372a; font-size: 28px; margin: 0;\">AakashAP</h1>\r\n<h2 style=\"color: #ffffff; font-size: 20px; margin: 10px 0;\">New Blog Alert! 🚀</h2>\r\n</td>\r\n</tr>\r\n<!-- Body Section -->\r\n<tr>\r\n<td style=\"padding: 30px; font-family: Arial, sans-serif; color: #333; line-height: 1.6;\">\r\n<p style=\"font-size: 16px; margin-bottom: 15px;\">Hi [username],</p>\r\n<p style=\"font-size: 16px; margin-bottom: 15px;\">I\'m thrilled to announce that I\'ve published a new blog on my website! 🎉 Explore the latest insights, tips, and ideas in my latest article.</p>\r\n<p style=\"text-align: center; margin: 30px 0;\"><a style=\"text-decoration: none; background-color: #ba372a; color: #ffffff; padding: 12px 30px; font-size: 16px; border-radius: 5px; display: inline-block;\" href=\"[Blog Link]\">Read Blog</a></p>\r\n<p style=\"font-size: 16px; margin-bottom: 15px;\">Happy reading! Feel free to share your thoughts or ask questions in the comments section.</p>\r\n<p style=\"font-size: 16px; margin-bottom: 0;\">Best regards,</p>\r\n<p style=\"font-size: 16px; font-weight: bold;\">[admin]</p>\r\n</td>\r\n</tr>\r\n<!-- Footer Section -->\r\n<tr>\r\n<td style=\"background-color: #333333; color: #ffffff; text-align: center; padding: 20px;\">\r\n<p style=\"margin: 0; font-size: 14px;\">Connect with me:</p>\r\n<p style=\"margin: 10px 0;\"><a style=\"color: #3598db; text-decoration: none; margin: 0 10px;\" href=\"https://www.linkedin.com/in/aakashap\">LinkedIn</a> <a style=\"color: #e03e2d; text-decoration: none; margin: 0 10px;\" href=\"https://github.com/AakashAp01\">GitHub</a> <a style=\"color: #b96ad9; text-decoration: none; margin: 0 10px;\" href=\"https://www.instagram.com/_aakash_ap_/profilecard/?igsh=MTEwaXB6Mnh4c3B6Yg==\">Instagram</a></p>\r\n<p style=\"margin: 0; font-size: 12px;\">&copy; 2024 AakashAP. All rights reserved.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'active', '2024-11-17 03:19:32', '2024-11-17 03:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `blog_id`, `created_at`, `updated_at`) VALUES
(101, 1, 12, '2024-12-04 12:34:47', '2024-12-04 12:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_21_164049_create_permission_tables', 1),
(6, '2024_10_22_150557_create_settings_table', 1),
(7, '2024_10_22_163645_create_contact_mes_table', 1),
(8, '2024_10_25_142108_create_projects_table', 1),
(9, '2024_10_25_171940_create_email_templates_table', 1),
(10, '2024_10_30_093650_create_chat_messages_table', 1),
(11, '2024_11_12_150326_create_blog_categories_table', 1),
(12, '2024_11_12_164428_create_blogs_table', 1),
(13, '2024_11_18_164332_create_likes_table', 2),
(15, '2024_11_22_173035_add_thumbnail_to_blogs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `link`, `type`, `description`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Project Management App', 'https://lteproj.londontechequity.co.uk/', 'laravel', '<div class=\"row\"><!-- Left Section (Technologies) -->\r\n<div class=\"col-md-12\">\r\n<p><strong>Description</strong>: Developed features for admins to register projects, assign them to managers, and upload necessary resources for project execution. Enabled managers to create tasks based on assigned projects, allocate them to staff members, and coordinate workflows effectively. Integrated a mobile app for clients to monitor project progress, access uploaded resources, and explore blogs and service offerings. Utilized Laravel and MySQL for backend operations, delivering a responsive and user-friendly interface for both web and mobile platforms.</p>\r\n<p><strong>Technologies Used:</strong> The project was built using <span style=\"color: rgb(224, 62, 45);\">Laravel</span> for backend operations, <span style=\"color: rgb(53, 152, 219);\">MySQL</span> for database management, and <span style=\"color: rgb(241, 196, 15);\">JavaScript</span> and <span style=\"color: rgb(52, 73, 94);\">Ajax</span> for dynamic client-side interactions. For styling and responsive design, <span style=\"color: rgb(45, 194, 107);\">CSS</span> and <span style=\"color: rgb(132, 63, 161);\">Bootstrap</span> were used. Version control and collaboration were managed with <strong>Git</strong>.</p>\r\n</div>\r\n</div>', '[\"project\\/1734622299-67643c5b0e3c3.png\"]', '2024-11-24 02:55:22', '2024-12-19 10:01:39'),
(2, 'Codent A Dental Referral App', 'https://codent.londontechequity.co.uk/', 'codeigniter', '<div class=\"row\"><!-- Left Section (Description and Technologies Explanation) -->\r\n<div class=\"col-md-12\">\r\n<p><strong>Description</strong>: Designed and developed a web application enabling dentists to efficiently refer patients to specialists and collaborate on treatment plans. Implemented robust patient management features, allowing the tracking of patient histories and referral statuses. Utilized CodeIgniter and MySQL for backend functionality with a responsive frontend built using Bootstrap and JavaScript.</p>\r\n<p><strong>Technologies Used:</strong> The application was built using <span style=\"color: rgb(224, 62, 45);\">CodeIgniter</span> for backend development and <span style=\"color: rgb(53, 152, 219);\">MySQL</span> for database management. For interactive user interfaces, <span style=\"color: rgb(241, 196, 15);\">JavaScript</span>, <span style=\"color: rgb(52, 73, 94);\">Ajax</span>, <span style=\"color: rgb(45, 194, 107);\">CSS</span>, and <span style=\"color: rgb(132, 63, 161);\">Bootstrap</span> were used. Version control was handled with <strong>Git</strong>, ensuring efficient collaboration and code management.</p>\r\n</div>\r\n</div>', '[\"project\\/1734622526-67643d3ed3733.png\"]', '2024-11-24 03:47:00', '2024-12-19 10:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'web-user', 'web', '2024-10-30 05:48:54', '2024-10-30 05:48:54'),
(2, 'admin', 'web', '2024-10-30 05:51:04', '2024-10-30 05:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_favicon\r\n', NULL, NULL, NULL),
(2, 'font_style', '\"Tektur\", sans-serif', NULL, '2024-11-30 08:08:38'),
(3, 'site_logo', 'site_logos/1730352212.png', NULL, '2024-10-30 18:23:32'),
(5, 'site_about_profile', 'site_about_profile/1733032391.jpg', NULL, '2024-12-01 00:23:11'),
(6, 'resume', 'resume/1733032208.pdf', NULL, '2024-12-01 00:20:08'),
(7, 'linkedin', 'https://www.linkedin.com/in/aakashap', NULL, '2024-10-30 17:33:59'),
(8, 'instagram', 'https://www.instagram.com/_aakash_ap_/profilecard/?igsh=MTEwaXB6Mnh4c3B6Yg==', NULL, '2024-10-30 17:33:59'),
(9, 'whatsapp', '+911234567890', NULL, '2024-10-30 17:32:50'),
(10, 'twitter', 'http://twitter', NULL, '2024-10-30 17:33:59'),
(11, 'github', 'https://github.com/AakashAp01', NULL, '2024-10-30 17:33:38'),
(12, 'about_content', '<h2 class=\"display-6 text-color-primary\">I\'m Aakash Prajapati,</h2>\r\n<p class=\"lead\">- A Laravel, CodeIgniter, and PHP Developer with a passion for creating dynamic and user-friendly web applications. I have experience in building scalable web solutions, managing databases, and implementing RESTful APIs. My expertise lies in designing and developing full-stack applications using modern web technologies.</p>\r\n<p class=\"lead\">- As a backend developer, I specialize in developing robust, secure, and performance-driven applications. While my focus is on backend technologies like Laravel, CodeIgniter, and PHP, I also have basic knowledge of frontend tools like Bootstrap and CSS. Additionally, I am proficient in using Postman for API testing and have foundational experience with web hosting platforms like cPanel and Hostinger.</p>', NULL, '2024-11-30 13:33:33'),
(13, 'facebook', 'http://facebook', '2024-10-30 17:32:50', '2024-10-30 17:33:59'),
(14, 'site_favicon', 'site_favicons/1732441367.png', '2024-10-30 17:35:44', '2024-11-24 04:12:47'),
(15, 'tiny_editor_api', 'rke6j7wmeidx5mcast0g94b6q8x1565u87dghopcqb93l83s', '2024-11-16 02:44:17', '2024-11-16 02:44:17'),
(16, 'smtp_server', 'smtp.gmail.com', '2024-11-16 07:38:01', '2024-11-16 07:51:15'),
(17, 'smtp_port', '465', '2024-11-16 07:38:01', '2024-11-16 08:23:38'),
(18, 'smtp_encryption', 'ssl', '2024-11-16 07:38:01', '2024-11-16 07:38:01'),
(19, 'smtp_username', 'aakashap309@gmail.com', '2024-11-16 07:38:01', '2024-11-16 07:51:15'),
(20, 'smtp_password', 'dmaa pzdf fetw mfbs', '2024-11-16 07:38:01', '2024-11-16 07:49:35'),
(21, 'from_email', 'aakashap309@gmail.com', '2024-11-16 07:38:01', '2024-11-16 07:38:01'),
(22, 'from_name', 'Aakash Prajapati', '2024-11-16 07:38:01', '2024-11-16 07:38:01'),
(23, 'theme_color', '#db0630', '2024-11-24 04:09:04', '2024-12-19 10:18:43'),
(24, 'google_font_links', '<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\r\n<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\r\n<link href=\"https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Saira:ital,wght@0,100..900;1,100..900&family=Sono:wght@200..800&family=Tektur:wght@400..900&display=swap\" rel=\"stylesheet\">', '2024-11-30 08:05:29', '2024-11-30 08:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$p9qcVB1kOP0N1OUk4ClDQOXlnGU3r5cM/z7LGm4DkXGMMfEwZ.aX.', 'admin_profile/iwNXfPQwDpcn5nXSIVXnILR00FEQXjBtHtakKkbb.png', NULL, NULL, '2024-11-16 02:41:45'),
(4, 'web', 'web@gmail.com', NULL, '$2y$10$9jWJjVJoYkOqHsnhUCbGTug.PpeIXu7QlpcZOwYztbmEornh7aEmi', NULL, NULL, '2024-11-24 02:38:30', '2024-11-24 02:38:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_title_unique` (`title`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_sender_id_foreign` (`sender_id`),
  ADD KEY `chat_messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `contact_me`
--
ALTER TABLE `contact_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `contact_me`
--
ALTER TABLE `contact_me`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`);

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
