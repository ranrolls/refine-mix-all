﻿<?php

 $ipaddress = $_SERVER['REMOTE_ADDR'];

 //$ipaddress = $_SERVER['REMOTE_ADDR'];
 //$ipaddress1 ='219.75.27.16'; //singapore
//$ipaddress2 ='122.176.28.80'; // india


function geoCheckIP($ip)
{
    $response=@file_get_contents('http://www.netip.de/search?query='.$ip);

    $patterns=array();
    $patterns["country"] = '#Country: (.*?)&nbsp;#i';

    $ipInfo=array();

    foreach ($patterns as $key => $pattern)
    {
        $ipInfo[$key] = preg_match($pattern,$response,$value) && !empty($value[1]) ? $value[1] : 'not found';
    }

        return $ipInfo;
}

$data=geoCheckIP($ipaddress);


  $country = $data['country'];
//echo '<br/><br/>';
   $new_ar= substr($country,0,2);
 

//echo $country= $data->country;


?>
<!doctype html>
<html lang="en" class="theme-b has-gradient has-pattern">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Social Circle - Customised facebook apps & Social Media Campaigns</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9, user-scalable=no, target-densitydpi=device-dpi">
<script src="javascript/head.js"></script>
<link rel="stylesheet" media="screen" href="styles/screen.css">
<link rel="stylesheet" media="print" href="styles/print.css">
<link rel="stylesheet" href="icon-fonts/font-awesome-4.3.0/css/font-awesome.min.css"/>
<link rel="icon" type="image/x-icon" href="images/favicon2.ico">
</head>
<body>
<div id="root">
  <header id="top">
    <h1><a href="http://www.socialleads.eu/" accesskey="h"><img src="images/logo.png" alt="logo"></a></h1>
    <nav id="nav">
      <ul>
        <li style="padding-top:8px; color:#fff;">customised facebook apps & Social Media Campaigns</li>
        <!--<li><a accesskey="1" href="index.html">Facebook Apps & Social Media Campaigns</a> <em>(1)</em></li>
        <li><a accesskey="2" href="index.html">Feature</a> <em>(1)</em></li>
        <li><a  href="#">FAQs</a> <em>(2)</em> 
          <ul>
            <li><a href="./">Lorem ipsum dolor</a></li>
            <li><a href="./">Lorem ipsum dolor</a></li>
            <li><a href="./">Lorem ipsum dolor</a></li>
          </ul> 
        </li>
        <li><a accesskey="4" href="#">Contact</a> <em>(4)</em></li>-->
        <li class="as"><a class="top-nav-button"  href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L93SP8BWC5KTQ" target="_blank">Start for €199</a></li>
        <?php /*?><?php  if($new_ar=='AU'){
           
      echo '<li class="as"><a class="top-nav-button"  href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZNL7F4RRC5GCS" target="_blank">Start for $1</a></li>';
       } 
   else if($new_ar=='SG'){ 
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TQ2NPUH3RZVLJ" target="_blank">Start for $1</a></li>';
         }
            
  
		 else if($new_ar=='GB'){
           
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q6E5YRL3KMQ3L" target="_blank">Start for 99P</a></li>';
       } 
	   else if($new_ar=='US'){ 
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JK5CWDVZYSK3L" target="_blank">Start for $1</a></li>'; 
          }  

       else{  
        echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JK5CWDVZYSK3L" target="_blank">Start for $1</a></li>';
       } 
	   
       
                     
       ?><?php */?>
      </ul>
    </nav>
  </header>
  <article id="welcome">
    <h2><span>BIG</span> <em>social</em> <span>IDEAS</span> <em>for</em>
      <div class="clear"></div>
    </h2>
    <h2><span>SMALL BUSINESSES</span> <br>
    </h2>
    <div class="clear"></div>
    <br />
    <br />
    <h3><em>Social <span id="typer" data-typer-targets="eCommerce,Bookings,Appointments,Surveys,Contests,Coupons,Lead Generation">eCommerce</span></em></h3>
    <br />
    <p>We build custom facebook applications and create marketing campaigns for small businesses.</p>
    <br />
    <p class="uppercase" ><strong>Your first facebook App is on us</strong></p>
    <ul class="download-a a">
    <li class="as"><a class="top-nav-button"  href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L93SP8BWC5KTQ" target="_blank">Start for €199</a></li>
     <?php /*?> <?php  if($new_ar=='AU'){
           
      echo '<li class="as"><a class="top-nav-button"  href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZNL7F4RRC5GCS" target="_blank">Start for $1</a></li>';
       } 
   else if($new_ar=='SG'){ 
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TQ2NPUH3RZVLJ" target="_blank">Start for $1</a></li>';
         }
            
  
		 else if($new_ar=='GB'){
           
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q6E5YRL3KMQ3L" target="_blank">Start for 99P</a></li>';
       } 
	   else if($new_ar=='US'){ 
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JK5CWDVZYSK3L" target="_blank">Start for $1</a></li>'; 
          }  

       else{  
        echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JK5CWDVZYSK3L" target="_blank">Start for $1</a></li>';
       } 
       ?><?php */?>
    </ul>
    <p class="text-center">The first month is only $1 and thereafter $99 monthly. No contracts. Cancel anytime.</p>
  </article>
  <section id="content" class="a">
    <article>
      <header class="heading-a">
        <h3><span class="strong">What is Social Circle?</span></h3>
        <p>Social Circle helps businesses to grow visibility,  sales and revenue opportunities using its targeted marketing approach. We offer a powerful communication channel for branding and customer acquisition, engagement & loyalty with<br />
          Social Circle's customized facebook apps.</p>
      </header>
      <ul class="list-a">
        <li><a href="http://www.socialspark.biz/hi-tea-boutique-ecommerce/index.html" target="_blank"><i class="fa fa-shopping-cart"></i> <span class="title">E-commerce / Online Store Apps</span>
          <div>Take your storefront social and engage with potential customers.<br />
            Experience facebook commerce.</div>
          </a><br />
          <p class="blue-button"><a href="http://www.socialspark.biz/hi-tea-boutique-ecommerce/index.html" target="_blank">View Example</a></p>
        </li>
        <li><a href="http://www.socialspark.biz/sapporo-teppanyaki-booking-reservation/index.html" target="_blank"><i class="fa fa-bed"></i> <span class="title">Booking / Reservation<br />
          Apps</span>
          <div>Turbocharge your Hotel or Restaurant business with Social Bookings & Reservation Apps.</div>
          </a><br />
          <p class="blue-button"><a href="http://www.socialspark.biz/sapporo-teppanyaki-booking-reservation/index.html" target="_blank">View Example</a></p>
        </li>
        <li><a href="http://www.socialspark.biz/hd-brows-appointment/index.html" target="_blank"><i class="fa fa-clock-o"></i><span class="title">Appointment / Scheduling Apps </span>
          <div>Scheduling an appointment through your social channel, doesn't that sound powerful for your business?</div>
          </a><br />
          <p class="blue-button"><a href="http://www.socialspark.biz/hd-brows-appointment/index.html" target="_blank">View Example</a></p>
        </li>
        <li><a href="http://www.socialspark.biz/telunas-resorts-quiz/index.html" target="_blank"><i class="fa fa-puzzle-piece"></i> <span class="title">Survey / Polls & Quiz Apps</span>
          <div>Know what is running in the minds of your customers with some profit pulling quizzes!</div>
          </a><br />
          <p class="blue-button"><a href="http://www.socialspark.biz/telunas-resorts-quiz/index.html" target="_blank">View Example</a></p>
        </li>
        <li><a href="http://www.socialspark.biz/brit-olom-photo-contest/index.html" target="_blank"><i class="fa fa-trophy"></i> <span class="title">Sweepstake / Contest Apps</span>
          <div>Create a buzz with Sweepstakes and giveaways, people love to lay hands on them.</div>
          </a><br />
          <p class="blue-button"><a href="http://www.socialspark.biz/brit-olom-photo-contest/index.html" target="_blank">View Example</a></p>
        </li>
        <li><a href="http://www.socialspark.biz/kenko-wellness-coupons/index.html" target="_blank"><i class="fa fa-usd"></i> <span class="title">Coupon Apps</span>
          <div>Splurge coupons with Seasonal offers, Specials and more. Watch your facebook app gushing with traffic!</div>
          </a><br />
          <p class="blue-button"><a href="http://www.socialspark.biz/kenko-wellness-coupons/index.html" target="_blank">View Example</a></p>
        </li>
        <li><a href="http://www.socialspark.biz/lny-properties-email/index.html" target="_blank"><i class="fa fa-envelope-o"></i> <span class="title">Email Acquisition Apps</span>
          <div>Enabling your audience to easily sign up for information via the app. Great way to Generate Leads!</div>
          </a> <br />
          <p class="blue-button"><a href="http://www.socialspark.biz/lny-properties-email/index.html" target="_blank">View Example</a></p>
        </li>
        <li><a href="http://www.socialspark.biz/artify-instagram/index.html" target="_blank"><i class="fa fa-instagram"></i><span class="title">Social Media Integration Apps</span>
          <div>Save yourself from social media fatigue, view all your feeds / photos seamlessly into a single view.</div>
          </a> <br />
          <p class="blue-button"><a href="http://www.socialspark.biz/artify-instagram/index.html" target="_blank">View Example</a></p>
        </li>
        <li><a href="#"><i class="fa fa-wrench"></i> <span class="title">Custom Tab Apps</span>
          <div>Need anything customized or specific? Not to worry. Our team of social experts can help!</div>
          </a> <br />
          <p class="blue-button"><a href="#">Contact Us</a></p>
        </li>
      </ul>
    </article>
    <article class="va">
      <header class="heading-a">
        <h3><span class="strong">More than building just facebook apps</span></h3>
      </header>
      <div class="content">
        <figure class="sticky-b"><img src="images/e12.png" alt=""></figure>
        <div class="margin-left50">
          <div class="heading-a text-left">
            <p><strong>With our “less isolated tactics and more integrated strategy” approach we do much more. <br/>
              Here's what you get with Social Circle.</strong></p>
            <div class="listing">
              <ul>
                <li><i class="fa fa-circle-o"></i> <b>Custom facebook app </b> - Bespoke facebook marketing app to highlight the striking features of your small business, engaging and enthralling your audience socially.</li>
                <br/>
                <li> <i class="fa fa-circle-o"></i> <b>Campaign Setup, Promotion & Management </b>- Creation of campaigns to drive traffic, engage customers via promotions, banners, ads and moderate social media content.</li>
                <br/>
                <!--<li> <i class="fa fa-circle-o"></i> <b>Manage Social Media Posts </b> - Manage your comments and reviews of your business and comminicate with your customers.</li>-->
                <li><i class="fa fa-circle-o"></i> <b>Analytics & Reporting </b> - Monthly reports and analytics to monitor your social progress.</li>
                <br/>
                <li> <i class="fa fa-circle-o"></i> <b>Social Specialist </b> - A dedicated Social Account Manager to guide and manage your business social account.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </article>
    <article class="vb">
      <header class="heading-a b">
        <h3><span class="strong">Small businesses love Social Circle </span> </h3>
      </header>
      <div class="social-circle">
        <ul>
          <li><img src="img/for1.png">
            <p>RESTAURANTS & CAFES</p>
          </li>
          <li><img src="img/for11.png">
            <p>ACTIVITIES & EVENTS</p>
          </li>
          <li><img src="img/for5.png">
            <p>HOTELS</p>
          </li>
          <li><img src="img/for4.png">
            <p>HEALTH & WELLNESS</p>
          </li>
          <li><img src="img/for8.png">
            <p>FLORISTS</p>
          </li>
          <li><img src="img/for9.png">
            <p>PETS</p>
          </li>
          <li><img src="img/for7.png">
            <p>RETAIL</p>
          </li>
          <li><img src="img/for6.png">
            <p>SPAS & SALONS</p>
          </li>
          <li><img src="img/for3.png">
            <p>BARS & CLUBS</p>
          </li>
          <li><img src="img/for10.png">
            <p>HOME SERVICES</p>
          </li>
          <li><img src="img/for2.png">
            <p>AUTOMOTIVE</p>
          </li>
          <li><img src="img/for12.png">
            <p>AND MORE</p>
          </li>
        </ul>
      </div>
    </article>
    <!--<article>
      <header class="heading-a">
        <h3><span class="strong">Why Your Business Needs a Facebook App?</span></h3>
      </header>
      <center>
        <img src="images/ipad.jpg">
      </center>
      <br />
      <br />
      <div class="mobile-g"><img src="http://placehold.it/530x300" alt="Placeholder" width="530" height="300"></div>
      <ol class="list-b b">
        <li><span class="title">Brand Awareness</span>Empowering  your business Socially!</li>
        <li><span class="title">Lorem ipsum</span> Consectetuer adipiscing elit, sed diam nonummy</li>
        <li><span class="title">Lorem ipsum</span> Consectetuer adipiscing elit, sed diam nonummy</li>
      </ol>
    </article>-->
    <article>
      <header class="heading-a">
        <h3><span class="strong">Why your business needs a facebook app?</span></h3>
      </header>
      <ol class="list-b">
        <li><span class="title">Brand Awareness</span> Empowering  your business socially!</li>
        <li><span class="title">Engage Customers</span> Contests, coupons, hashtaging events, flashing new products - activities to engage your fans socially </li>
        <li><span class="title">Boost Traffic</span> Excellent tool  to drive traffic to your small business and generate revenue.</li>
        <li><span class="title">Generate Revenue</span> Broaden your reach, grow your customers socially with our customized facebook apps!</li>
        <li class="mobile-b"><img src="images/ipad.gif" alt=""></li>
      </ol>
    </article>
    <article class="vb">
      <header class="heading-a">
        <h3><span class="strong">We like our customers and they like us too!</span></h3>
      </header>
      <ul class="slider-a">
        <li><img src="images/t-1.jpg" alt="Placeholder" width="157" height="157"><span class="title"><span>Amanda Smith</span> <!--Digital Designer--></span> My brand has gained immense popularity, people talk about my product and my business is blooming like never before. In my opinion a very fine, but especially a smooth project. The result is a modern and visually powerful app, with opportunities for the future. I highly recommend these folks for other SME’s because if you have to grow your business they are the right people to go to. </li>
        <li><img src="images/t-2.jpg" alt="Placeholder" width="157" height="157"><span class="title"><span>Josh Noel</span> </span> The facebook app developed for my brand has helped my brand grow to an entirely new horizon driving more traffic than expected. I recommend small businesses to definitely work with you mainly because the app created by Social Circle has helped my brand grow and that is exactly what small businesses want.</li>
        <li><img src="images/t-3.jpg" alt="Placeholder" width="157" height="157"><span class="title"><span>Jackie O'Brien</span> </span>Before Social Circle created an facebook app for my retail business, I tried a lot of other options to grow my business, but none like the Social Circle. From the onset of the process, they helped me transform my small business into a successful business.</li>
      </ul>
    </article>
    <div>
      <header class="heading-a">
        <h3><span class="strong">FAQs</span> </h3>
      </header>
      <div class="faq-l">
        <h6 class="margin-bottom-5" >Why should my business have a facebook app?</h6>
        <p>Your customers are on the social platforms, that’s where your business should be. Social Circle customizes your fan Page with apps whereby you can significantly enhance the user’s experience, keep your fans engaged and coming back for more. Facebook apps help you to increase your “viral visibility”</p>
        <br />
        <h6 class="margin-bottom-5" > I already have a facebook page how different is the facebook app? </h6>
        <p>Brilliant! Now that you are smitten by the social bug, your next step is to reach out to your prospects and customers through facebook and other channels. Your facebook page isn’t enough to generate new business, you will have to increase your reach to drive traffic to your FB page and a customized facebook app is the perfect way of doing it.</p>
        <br />
        <h6 class="margin-bottom-5" > What kind of businesses are suitable for facebook apps?</h6>
        <p> Restaurants & Cafes; Activities & Events, Hotels, Hospitality, Spa & Salons, Bars & Clubs, Education, Retail etc. Our facebook apps are tailored specifically for small businesses bearing in mind the budgets.</p>
        <br />
        <h6 class="margin-bottom-5">The first month is only $1? </h6>
        <p>Start for $1 for the first month. After that it will be $99 a month. No contracts. Cancel any time.</p>
      </div>
      <div class="faq-r">
        <h6 class="margin-bottom-5">Will my facebook app replace my website?</h6>
        <p>Not at all! It will compliment your website and broaden your reach socially.</p>
        <br />
        <div class="margin-bottom-80"></div>
        <h6 class="margin-bottom-5">What are the different categories of facebook apps that are suitable for my business? How would I know that?</h6>
        <p>Let the experts do that!  Social Circle creates customised facebook apps for your eCommerce needs – facebook commerce apps, contests, sweepstakes, loyalty, coupons, custom tab apps, social media integration apps, lead generation apps and much more.</p>
        <br />
        <h6 class="margin-bottom-5">What will Social Circle do for my business? </h6>
        <p>Once you sign up with us, we assign you with an Account Manager to work alongside on gathering more information on your business needs while our team gears up in putting together your first facebook app for you.</p>
        <br />
      </div>
    </div>
    <!--<div>
      <header class="heading-a">
        <h3><span class="strong">Case Studies</span> </h3>
      </header>
      <div class="news-c">
        <header>
          <h4>Features</h4>
        </header>
        <div>
          <article>
            <figure><img src="images/b1.jpg" alt="" width="500" height="460"></figure>
            <h5><a href="./"><span>Lorem ipsum</span> dolor sit amet</a></h5>
            <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
          </article>
          <article>
            <figure><img src="images/b2.jpg" alt="" width="500" height="460"></figure>
            <h5><a href="./"><span>Lorem ipsum</span> dolor sit amet</a></h5>
            <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
          </article>
          <article>
            <figure><img src="images/hi-tea.jpg" alt="Placeholder" width="500" height="460"></figure>
            <h5><a href="./"><span>Lorem ipsum</span> dolor sit amet</a></h5>
            <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
          </article>
          <article>
            <figure><img src="http://placehold.it/500x460" alt="Placeholder" width="500" height="460"></figure>
            <h5><a href="./"><span>Lorem ipsum</span> dolor sit amet</a></h5>
            <p>Consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>
          </article>
        </div>
      </div>
    </div>--> 
    <!--<article class="va">
					<header class="heading-a">
						<h3><span class="small">Plans</span> <span class="strong">Lorem ipsum</span> dolor sit amet</h3>
						<p>Prices for every pocket</p>
					</header>
					<ul class="list-c">
						<li class="a">
							<span>Trial <span>free</span></span>
							<ul>
								<li>60 day free trial</li>
								<li>Functional Offline</li>
								<li>Synced to cloud database</li>
								<li>Unlimited Bottles</li>
							</ul>
							<a href="./">Register</a>
						</li>
						<li class="b">
							<span>Monthly <span>$10</span></span>
							<ul>
								<li>60 day free trial</li>
								<li>Functional Offline</li>
								<li>Synced to cloud database</li>
								<li>Unlimited Bottles</li>
							</ul>
							<a href="./">Register</a>
						</li>
						<li class="c">
							<span>Yearly <span>$80</span></span>
							<ul>
								<li>60 day free trial</li>
								<li>Functional Offline</li>
								<li>Synced to cloud database</li>
								<li>Unlimited Bottles</li>
							</ul>
							<a href="./">Register</a>
						</li>
					</ul>
				</article>-->
    <article class="vb">
      <header class="heading-a b">
        <h3><span class="strong">Your first facebook app is on us!</span> </h3>
      </header>
      <ul class="list-c">
      <li class="as"><a class="top-nav-button"  href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=L93SP8BWC5KTQ" target="_blank">Start for €199</a></li>
        <?php /*?><?php  if($new_ar=='AU'){
           
      echo '<li class="as"><a class="top-nav-button"  href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZNL7F4RRC5GCS" target="_blank">Start for $1</a></li>';
       } 
   else if($new_ar=='SG'){ 
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TQ2NPUH3RZVLJ" target="_blank">Start for $1</a></li>';
         }
            
  
		 else if($new_ar=='GB'){
           
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Q6E5YRL3KMQ3L" target="_blank">Start for 99P</a></li>';
       } 
	   else if($new_ar=='US'){ 
      echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JK5CWDVZYSK3L" target="_blank">Start for $1</a></li>'; 
          }  

       else{  
        echo '<li class="as"><a class="top-nav-button" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=JK5CWDVZYSK3L" target="_blank">Start for $1</a></li>';
       } 
	   
       
                     
       ?><?php */?>
       <!-- <li> <a href="https://www.2checkout.com/checkout/purchase?sid=102680797&quantity=1&product_id=1" target="_blank">Start for $1</a> </li>-->
      </ul>
      <p class="text-center">Start for $1 for the first month. After that it will be $99 a month. No contracts. Cancel anytime.</p>
      <br />
      <br />
      <ul class="social-a">
        <li><img src="images/paypal.png" alt=""></li>
        <li><img src="images/master.png" alt=""></li>
        <li><img src="images/visa.png" alt=""></li>
      </ul>
    </article>
  </section>
  <footer id="footer">
    <div id="content">
      <div class="l">
        <h3 class="border">Social Circle</h3>
        <div class="clear"></div>
        <div class="text1">Social Circle is a powerful tool for the SME’s to drive traffic, increase revenue and engage customers, socially. Our team helps small businesses by tailoring effective Social Media Marketing solutions. We build facebook marketing apps, focusing on our your business to establish an online presence and compete with other businesses online. Brand awareness and traffic to engage customers and generate leads - all of these benefits will keep your business going tremendously.</div>
      </div>
      <div class="r">
        <h3 class="border1">Contact Us</h3>
        <div class="clear"></div>
        <div class="cont-text ">Happy to Help <br /> Contact our sales or support team below.</div>
       <!-- <br />
        <div class="cont-text blue "><a href="tel:61 411 373 430" >+61 411 373 430</a></div>-->
        <br />
        <div class="cont-text blue"><!--<i class="fa fa-envelope-o"></i>--><a href="mailto:sales@socialcircle.marketing"> Sales - sales@socialcircle.marketing</a></div>
        <br />
        <div class="cont-text blue"><!--<i class="fa fa-envelope-o"></i>--><a href="mailto:clientsuccess@socialcircle.marketing"> Support - clientsuccess@socialcircle.marketing</a></div>
      </div>
    </div>
    <p style="padding-top: 35px;"><a href="../contact/">Contact</a> <a href="../terms_conditions/">Terms & Conditions</a></p>
    <p>&copy; <span class="date">2015</span> Social Circle. All rights reserved. <!--<a href="./">Privacy Policy</a> <a href="./">Terms of Service</a>--></p>
  </footer>
</div>
<script>
 head.load('javascript/jquery.js','javascript/tf.js','javascript/scripts.js','javascript/mobile.js')
</script> 
<script src="javascript/jquery-1.js"></script> 
<script src="javascript/util.js"></script> 
<script src="javascript/lib.js"></script> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65377455-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>