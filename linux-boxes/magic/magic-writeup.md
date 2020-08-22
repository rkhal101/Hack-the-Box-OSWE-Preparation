# OSWE Prep - Hack the Box Magic

![](/linux-boxes/magic/images/01.png)

This is the 1st blog out of a series of blogs I will be publishing on retired HTB machines in preparation for the OSWE. The full list of OSWE like machines compiled by [TJ_Null](https://twitter.com/TJ_Null) can be found [here](https://docs.google.com/spreadsheets/u/1/d/1dwSMIAPIam0PuRBkCiDI88pU3yzrqqHkDtBngUHNCw8/htmlview#). This box is not on TJ_Null's list, however, when working on the initial foothold, I found it to be very similar to an exercise I worked on in the OSWE labs and therefore, made the decision to include it in the list of boxes.

The blog will be divided into three sections:

* **Box Walkthrough:** This section provides a walkthrough of how to solve the box.
* **Automated Script(s):** This section automates the web application attack vector(s) of the box. This is in an effort to improve my scripting skills for the OSWE certification.
* **Code Review:** This section dives into the web application code to find out what portion(s) of the insecure code introduced the vulnerabilities. Again, this is in an effort to improve my code review skills for the OSWE certification.

## Box Walkthrough

This section provides a walkthrough of how to solve the box.

### Reconnaissance

Run [AutoRecon](https://github.com/Tib3rius/AutoRecon) to enumerate open ports and services running on those ports.

```
autorecon.py 10.10.10.185
```

View the full TCP port scan results.

```
root@kali:~/# cat _full_tcp_nmap.txt 
...
Not shown: 65533 closed ports
Reason: 65533 resets
PORT   STATE SERVICE REASON         VERSION
22/tcp open  ssh     syn-ack ttl 63 OpenSSH 7.6p1 Ubuntu 4ubuntu0.3 (Ubuntu Linux; protocol 2.0)
... 
80/tcp open  http    syn-ack ttl 63 Apache httpd 2.4.29 ((Ubuntu))                   
| http-methods:                                                                      
|_  Supported Methods: GET HEAD POST OPTIONS                                         
|_http-server-header: Apache/2.4.29 (Ubuntu)
|_http-title: Magic Portfolio
Aggressive OS guesses: Linux 2.6.32 (95%), Linux 3.1 (95%), Linux 
....
```

We have two ports open.
* **Port 22:** running OpenSSH 7.6p1
* **Port 80:** running Apache httpd 2.4.29

Before we move on to enumeration, let's make some mental notes about the scan results.
* The OpenSSH version that is running on port 22 is not associated with any critical vulnerabilities, so it's unlikely that we gain initial access through this port, unless we find credentials.
* Port 80 is running a web server. AutoRecon by default runs gobuster and nikto scans on HTTP ports, so we'll have to review them. Since this is the only other port that is open, it is very likely to be our initial foothold vector.
