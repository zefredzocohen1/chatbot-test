<?php
/*
* cần có 1 số bảng
* có 2 loại tài khoản
*      admin toàn quyền
*      user: chỉ có thay đổi trên user đó và các quyền encode_video nếu có
*có 2 loại thẻ
*      trailer:
*          chỉ encode 2 video trong 1 ngày,
*          thời gian dùng thử 20 ngày,
*          chỉ sử dụng được các tool default
**     1:vip( trả tiền theo tháng sử dụng )
**     1:vip( trả tiền theo quý sử dụng )
*      1:vip( trả tiền theo 6 tháng sử dụng )
*      1:vip( trả tiền theo năm sử dụng )
*      2:vip2( trả tiền theo từng video encode)
*      3: vip3
* user: name, email, password, refresh_token, auth, type card, Time remaining
* *card: name, description, image, money,
* Auth: user, status_contract, ,
* tool-encode: name, status, bug_name,
* bug: name, create_time, fix_time
* job: các queue run on system
* encode_video: name file, type, name-image, info-video, user, status,
* upload_video: video, account_name, account_email, account_password,
* history: user, action, create_time, ip, description
* controller tool encode
*      video
*      2d
*      3d
*      fullscreen
*      scale_screen
*      add_subtitle
*
* Resolution	Audio Bit Rate	Compression
Original	192 kbps	AAC
1080p	192 kbps	AAC
720p	192 kbps	AAC
480p	128 kbps	AAC
360p	128 kbps	AAC
240p	64 kbps	MP3

Prior to July 2012, YouTube used these audio qualities:

Resolution	Audio Bit Rate	Compression
Original	152 kbps	AAC
1080p	152 kbps	AAC
720p	152 kbps	AAC
480p	128 kbps	AAC
360p	128 kbps	AAC
240p	64 kbps	MP3

Prior to May 2011, YouTube used these audio qualities:

Resolution	Audio Bit Rate	Compression
1080p	128 kbps	AAC
720p	128 kbps	AAC
480p	128 kbps	AAC
360p	128 kbps	AAC
240p	64 kbps	MP3

Prior to March 2011, YouTube used these audio qualities for several years:

Resolution	Audio Bit Rate	Compression
1080p	128 kbps	AAC
720p	128 kbps	AAC
480p	96 kbps	AAC
360p	96 kbps	AAC
240p	64 kbps	MP3


Type	Video Bitrate	Mono Audio Bitrate	Stereo Audio Bitrate	5.1 Audio Bitrate
2160p (4k)	35-45 Mbps	128 kbps	384 kbps	512 kbps
1440p (2k)	10 Mbps	128 kbps	384 kbps	512 kbps
1080p	8,000 kbps	128 kbps	384 kbps	512 kbps
720p	5,000 kbps	128 kbps	384 kbps	512 kbps
480p	2,500 kbps	64 kbps	128 kbps	196 kbps
360p	1,000 kbps	64 kbps	128 kbps	196 kbps
HQ :
Type	Video Bitrate	Mono Audio Bitrate	Stereo Audio Bitrate	5.1 Audio Bitrate
1080p	50,000 kbps	128 kbps	384 kbps	512 kbps
720p	30,000 kbps	128 kbps	384 kbps	512 kbps
480p	15,000 kbps	128 kbps	384 kbps	512 kbps
360p	5,000 kbps	128 kbps	384 kbps	512 kbps
*
 * Làm sao để kiếm được 5k usd/month
 *      500 lương
 *      chạy ads phim 500x4
 *      tool youtube: 2k
 *      tool site tin tức: 200x4
 *      tool share theme 200x2
 *
 * Dùng 5k usd/month
 *      500 gửi về quê
 *      300 chi tiêu sinh hoạt trên hà nội
 *      4,2k gửi ngân hàng
 *
 * System Configuration
Make sure that the latest version of PHP (at least 5.4.9) is installed
Disable user quotas, which makes them unlimited
Your temp file or partition has to be big enough to hold multiple parallel uploads from multiple users; e.g. if the max upload size is 10GB and the average users uploading the same time is 100: temp space has to hold at least 10x100 GB
Configuring Your Webserver
ownCloud comes with its own owncloud/.htaccess file. Set the following two parameters inside this .htaccess file:

php_value upload_max_filesize = 16G
php_value post_max_size = 16G
Adjust these values for your needs. If you see PHP timeouts in your logfiles, increase the timeout values, which are in seconds:

php_value max_input_time 3600
php_value max_execution_time 3600
The mod_reqtimeout Apache module could also stop large uploads from completing. If you’re using this module and getting failed uploads of large files either disable it in your Apache config or raise the configured RequestReadTimeout timeouts.

There are also several other configuration option in your webserver config which could prevent the upload of larger files. Please see the manual of your webserver how to configure those values correctly:

Apache
LimitRequestBody
SSLRenegBufferSize
Apache with mod_fcgid
FcgidMaxRequestLen
NginX
client_max_body_size
IIS
maxAllowedContentLength
Configuring PHP
If you don’t want to use the ownCloud .htaccess file, you may configure PHP instead. Make sure to comment out any lines .htaccess pertaining to upload size, if you entered any.

To view your current PHP configuration and to see the location of your php.ini file, create a plain text file named phpinfo.php with just this single line of code in it: <?php phpinfo(); ?>. Place this file in your Web root, for example /var/www/html, and open it in your Web browser, for example http://localhost/phpinfo.php. This will display your complete current PHP configuration. Look for the Loaded Configuration File section to see which php.ini file your server is using. This is the one you want to edit.

If you are running ownCloud on a 32-bit system, any open_basedir directive in your php.ini file needs to be commented out

Set the following two parameters inside php.ini, using your own desired file size values:

upload_max_filesize = 16G
post_max_size = 16G
Tell PHP which temp file you want it to use:

upload_tmp_dir = /var/big_temp_file/
Output Buffering must be turned off in .htaccess or php.ini, or PHP will return memory-related errors:

output_buffering = 0
* */