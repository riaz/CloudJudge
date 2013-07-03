#!C:\perl\bin\perl -w
use CGI;

$query = new CGI;

$secretword = $query->param('c');
$remotehost = $query->remote_host();

print $query->header;
print "<p>The secret word is <b>$secretword</b> and your IP is <b>$remotehost</b>.</p>";