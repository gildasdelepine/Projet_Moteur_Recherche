#!C:/Perl64/bin/perl.exe

my $javaArgs = " -cp /path/to/classpath -Xmx256";
my $className = HelloWorld;
my $javaCmd = "java ".$JAVA_ARGS." ".$className." ".join(' ', @ARGV);
my $out =`$javaCmd`;
print $out;
