<!DOCTYPE html>
<html>
<head>
	<title>OWL Test Site</title>
	<link rel="stylesheet" href="styles/style.css" />
</head>
<?php
	include("config.php"); # required for database information
	# Make a simple connection to the local database:
	$db_connection = new mysqli($db_servername, $db_username, $db_password);
	if($db_connection->connect_error){
		echo "<h1 class='fail'>MySQL Connection Unsuccessful.</h1>";
		exit();
	}else{
	}
?>
<body>
	<div class="container">
		<div class="blog_post">
			<div class="owasp_logo">
				<img src="./images/OWASP.png" width=300 />
			</div>
			This site contains hands-on examples of the <a href="https://www.owasp.org/index.php/Top_10-2017_Top_10">OWASP Top 10</a>.
			These examples are hand-coded in PHP and access an MariaDB database.
			Do not install this software in your production environment. Do no give this software internet access.
			<ul>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A1-Injection">Injection</a>: Covered in all sections.</li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A2-Broken_Authentication">Broken Authentication</a>: Covered in section 1</li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A3-Sensitive_Data_Exposure">Sensitive Data Exposure</a>: Covered in section 1, 5</li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A4-XML_External_Entities_(XXE)">XML External Entities</a>: <span class="fail">Not covered</span></li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A5-Broken_Access_Control">Broken Access Control</a>: Covered in section 1</li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A6-Security_Misconfiguration">Security Misconfiguration</a>: Covered in all sections, (PHP errors enabled)</li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A7-Cross-Site_Scripting_(XSS)">Cross Site Scripting</a>: Covered in section 3, 5</li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A8-Insecure_Deserialization">Insecure Deserialization</a>: <span class="fail">Not Covered</span> </li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A9-Using_Components_with_Known_Vulnerabilities">Insecure Components</a>: <span class="fail">Not Covered</span> </li>
				<li><a href="https://www.owasp.org/index.php/Top_10-2017_A10-Insufficient_Logging%26Monitoring">Insufficient Logging</a>: <span class="fail">Not Covered</span> </li>
			</ul>

			<hr /><br />
			<h1>Section 1</h1>
			The "<span class="fail">Login</span>" web application contains the following vulnerabilities:<br />
			<ul>
				<li>Client data tampering (SESSION)</li>
				<li>String-based SQL Injection (LOGIN)</li>
				<li>String-based SQL Injection (COOKIE)</li>
			</ul>
			<button onClick="javascript:window.location='login.php'">
				Login to OWL Admin Site >>
			</button>
			<br /><hr /><br />
			<h1>Section 2</h1>
			The "<span class="fail">Web Log</span>" web application contains the following vulnerabilities:<br />
			<ul>
				<li>Integer-based SQL Injection</li>
			</ul>
			<button onClick="javascript:window.location='http://127.0.0.1/sqlint.php?id=1'">
				Go to Web Log >>
			</button>
			<br /><hr /><br />
			<h1>Section 3</h1>
			The "<span class="fail">Client Input</span>" web application contains the following vulnerabilities:<br />
			<ul>
				<li>Cross-Site Script (XSS) via HTTP GET</li>
			</ul>
			<button onClick="javascript:window.location='xss.php?id=foo'">
				Go to Client Input >>
			</button>
			<br /><hr /><br />
			<h1>Section 4</h1>
			The "<span class="fail">File Inclusion</span>" web application contains the following vulnerabilities:<br />
			<ul>
				<li>Local File Inclusion</li>
			</ul>
			<button onClick="javascript:window.location='fileinclude.php?file=index.php'">
				Go to File Inclusion >>
			</button>
			<br /><hr /><br />
			<h1>Section 5</h1>
			The "<span class="fail">CMD Injection</span>" web application contains the following vulnerabilities:<br />
			<ul>
				<li>Command Injection</li>
			</ul>
			<button onClick="javascript:window.location='cmdinjection.php?filename=index.php'">
				Go to CMD Injection >>
			</button>

		</div>
	</div>
</body>
