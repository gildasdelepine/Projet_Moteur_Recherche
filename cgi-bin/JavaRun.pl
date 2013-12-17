#!C:/Perl64/bin/perl.exe

# my $javaArgs = " -cp C:/Program Files/Java/jdk1.7.0_45/lib/missioncontrol/plugins/* -Xmx256";
# my $javaCmd = "java ".$JAVA_ARGS." ".$className." ".join(' ', $text);

# use Java;
# $java = new Java;
# $obj = $java->create_object("com.my.Class","constructor parameter");
# $obj->myMethod("method parameter");
# $obj->setId(5);
# my $get = $ENV{'QUERY_STRING'};

$file='E:/wamp/cgi-bin/index.txt';

open(INFO, $file) or die("Could not open  file.");
open(FH, '>', 'E:/wamp/cgi-bin/color.index') or die "cannot open file";
select FH;
foreach $line (<INFO>)  
{   
	my $javaCmd = "java Color images/".$line;
	my $out =`$javaCmd`;
	print $out; 
}
close FH;

open(INFO, $file) or die("Could not open  file.");
open(FH2, '>', 'E:/wamp/cgi-bin/edge.index') or die "cannot open file";
select FH2;
foreach $line (<INFO>)  
{   
	my $javaCmd = "java Edge images/".$line;
	my $out =`$javaCmd`;
	print $out; 
}
close FH2;
close(INFO);

open(FH3, '>', 'E:/wamp/cgi-bin/edge.dist') or die "cannot open file";
select FH3;
my $javaCmd = "java Distance edge.index";
my $out =`$javaCmd`;
print $out;
close FH3;

open(FH4, '>', 'E:/wamp/cgi-bin/color.dist') or die "cannot open file";
select FH4;
my $javaCmd = "java Distance color.index";
my $out =`$javaCmd`;
print $out;
close FH4;

my $className = HelloWorld;
system("java ".$className." ".join(' ', 'DB_Update_Process_loadind ...'));

