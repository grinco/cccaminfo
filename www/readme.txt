CCcamInfoPHP v1.01
by TOOGOODY based on project started by ERMETHICAL.

This script is intended only for technology testing purposes, the authors do not condone piracy or cardsharing of any type.
This script is not to be modified in any way other than by the authors.

USAGE INSTRUCTIONS:

The main file to be run is index.php. You need a PHP enabled web-host (local or not) for running the script. 
- Unpack and upload files to web server
- edit config.php with cccam webinfo data , working folder , and other options there
- give WRITE access to working folder . If you need more protection please change working folder outside of web root

Cron jobs: 
 - "cron_ping.php?p=x"   : to check ping for all servers. Recomended : hourly cron job
 - "cron_online.php?p=x" : to check and record online servers. Recomended : every 30 min cron job
 - "cron_update.php?p=x" : to make a full update. This includes cron_online script. Recomended : hourly cron job
  where x = profile number (default 0). 
  
Php settings ... Because script uses a lot of memory and sometimes need more time to comlpete tasks, 
I recommend setting this values in php.ini:
	max_execution_time = 300  ; Maximum execution time of each script, in seconds
	memory_limit = 24M      	; Maximum amount of memory a script may consume (8MB)
	
To update from a previoius version copy everything except config.php. 
If previous version is older than v0.5 then config.php must be reset.

Version changes:
v1.01
 - fix for password protection 
v1.0
 - password protection & login page. Set password in config.php 
 - stats for offline clients
 - server profile configuration screen (User can create or delete server profiles). Thanks to Dragteam.
 - CCcam.providers update
v0.9//not released
 - memory_limit and max_execution_time set in script ( should work if PHP is not in safe mode)
 - little better memory usage
v0.8
 - ping fo ALL servers at once. Link is on top of ping column in Servers an Pairs page
 - best ever ping and warning for servers that have average ping much worst that best
 - known Used Providers List. Link is on top of provioder column in Providers page
 - new CCcam.providers
 - new way to show and calculate ECMok in Pairs page. Values shown in gray colour are recorded prevously, white are current values.
 - other minor changes
v0.7d
 - fix: Server Uptime limit to last 4 weeks
 - CCcam.providers update
 - other minor changes
v0.7c
 - server rating is back
 - improved ping. now min and max ping out of 5 tryes are ignored. ping is average of remaining 3 
 - clients for each provider
v0.7b
 - fixed a problem with saving notes ( appeared only with wamp & windows )
 - fixed & improved some sorting problems
 - improved profile selection
 - other minor changes
v0.7a
 - fixed a little bug with AVG sorting.
v0.7
 - new : Total handled LOCAL ecm's in homepage.
 - new : AVG ( Average usage) in clients page. 
 - new : Uptime for servers replaces old server index. Last 30 days of uptime info is stored.
 - Warning : Server Uptime and Client Usage stats are NOT accurate without cron jobs. 
 - other minor changes
v0.6b
 - changed Usage index formula. Now index represents exactly ECM Requests per hour
 - new : Detailed Client stats
v0.6a
 - Usage index for clients calculated from client ECM requests and Client Connected time
 - improved country detection + ISP info ( delete country.data file from work dir to force country detection at Update)
 - fixed ping for local private IP
v0.6
 - sortable Clients stats
 - personal notes for each server. On Pairs page first line of note is shown
 - last seen online for offline servers
 - prepared for cron jobs. See usage instructions above.
 - some other small enhancements and bugs fixed.
v0.5c
 - again fixed a bug at 'Update'
 - fixed bug at country detection.
v0.5b
 - fixed a bug at 'Update'
 - recorded Handled ECM ( all time high )for every server. Pair stats show combined recent ecm and recoded high
v0.5a
 - new : CCcam_fake.providers - please report if that list contains wrong caid
 - fake.providers : all 501 and 502 are marked fake ( from stupid gbox_indirect users )
 - pairs : clients without pair are in table now too
v0.5
 - WARNING : server definition in config.php is changed !
 - new : Entitlements page with basic info
 - new : mutiple servers selectable by clicking on server name from above menu.
 - new : CCcam_used.providers  - contains known uesd providers. CCcam_used.providers is updated from webinfo
 - new option : country_whois to define if you want country detection
 - ping check only on demand from server page
 - CCcam.providers updated
 - nodeid and servers are cached in !global folder from working directory
 - many other small fixes and changes
 
v0.4
 - new: Pairs page: shows client/server pairs based on IP matching. Additional paires can be manually set in pairs.data file from working folder.
 - changed provider identification to also show provider number
 - redesigned ping functionality. Ping speed to a server is detected and an average is saved at each refresh to a server page. 
 - country and ping info is dispalyed on servers page.
 - several minor changes and bug fixes
 - info : if your country is not detected you should open port 43 (whois) from firewall
 - info : if ping is not working than outgoing ports used by each server should be open in firewall
v0.3c
 - sortable columns in Provider stats
 - improved Server details with IP,Coutry and Responce Time(ping)
v0.3b
 - fixed bugs
v0.3a
 - fixed bug with criptoworks caid
v0.3
 - client and active client stats with country detection
 - sortable columns in Server stats
 - files in work folder are saved in a subfolder with server name
 - minor interface changes
 - removed option anonymous mode
 - CCcam.providers format as in cccam 1.7.1

v0.2c
 - improved Error Messages
 - ecmOK and servers in individual provider page
 - rearanged totals in Shares and Providers pages
 - fixed some small bugs

v0.2b
 - new : Detailed node info (click on node name)
 - new : Detailed info for CAID/Provider ( click on any CAID or Provider )

v0.2a
 - new : Recent Ecm requests in Home
 - new : Ecm and EcmOK in Providers 
 - other minor changes

v0.2
 - new : Detailed Server stats
 - greatly improved Server stats
 - some interface changes ( like colors,fonts )

v.01b
 - new : Servers stats
 - server rating system ( formula : 50*hop1 + 10*hop2 + uniquePercent*hop3 )
 - minor interface changes
 - fixed problem with update on hosts that do not allow php params
 - fixed problem with php5 ( not required anymore)

v.01a (initial version)
 - stats : Shares, Providers
 - uses ident.info for provider names ( but if CCcam.providers is present will override ident.inf)
 - shows reshare
 - configurable update button or real time.
 - configurable anonymous mode.
  
  
todo:
 - more stats
 
Have fun !