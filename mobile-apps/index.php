<?php




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
<link href="styles/bootstrap.css" rel=stylesheet media=screen>
<link href="styles/socialleads.css" rel=stylesheet media=screen>
<link rel="stylesheet" href="icon-fonts/font-awesome-4.3.0/css/font-awesome.min.css"/>
<link rel="icon" type="image/x-icon" href="images/favicon2.ico">
</head>
<body>
<ul id=gn-menu class=gn-menu-main style="z-index:-1">
  <li class=gn-trigger><a class="gn-icon gn-icon-menu"></a>
    <nav class=gn-menu-wrapper>
    </nav>
  </li>
</ul>
<div id="root">
  <header id="top">
    <h1><a href="../" accesskey="h"><img src="images/logo.png" alt="logo"></a></h1>
     <nav id="nav">
       <ul>
        <!--<li style="padding-top:8px; color:#fff;">Customised Website - Mobile Friendly, CMS, SEO & Shopping Cart</li>-->
        <li><a accesskey="2" href="../web/">Responsive websites</a> <em>(1)</em></li>
       <!-- <li><a  href="#">FAQs</a> <em>(2)</em> 
          <ul>
            <li><a href="./">Lorem ipsum dolor</a></li>
            <li><a href="./">Lorem ipsum dolor</a></li>
            <li><a href="./">Lorem ipsum dolor</a></li>
          </ul> 
        </li>-->
         <li class="active"><a accesskey="4" href="../mobile-apps/">Mobile applications</a> <em>(3)</em></li>
        <li><a accesskey="4" href="../facebook-apps/">Facebook applications</a> <em>(4)</em></li>
        <!--<li class="as"><a  class="top-nav-button" href="#" target="_blank">Sign Up</a></li>-->
            <?php   
   
               if($new_ar=='GB'){ 
      echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R3SBRE8ACSLQS" target="_blank">Sign Up</a></li>'; 
          }
    
    
      else if($new_ar=='US'){ 
      echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MQLABDM2K4Z7S" target="_blank">Sign Up</a></li>'; 
          }
		  
 
 else if($new_ar=='AT'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}
 
else if($new_ar=='GE'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='FR'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='IT'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}
 

else if($new_ar=='NO'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='ES'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

 
 else{  
        echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MQLABDM2K4Z7S" target="_blank">Sign Up</a></li>';
       }

?>


      </ul>
    </nav>
  </header>
  <article id="welcome">
    <h2><em>mobile apps for</em><!--<span>Customized</span> <em>mobile</em> <span>APPS </span> <em>for</em>-->
      <div class="clear"></div>
    </h2>
    <h2><span>SMALL BUSINESSES</span> <br>
    </h2>
    <div class="clear"></div>
    <br />
    <br />
    <h3 style="min-height:55px;"><em><!--Social--> <span id="typer" data-typer-targets="Push Notifications,CMS Integration,Digital Advertising,Click-2-Call,Maps">Push Notifications</span></em></h3>
    <br />
    <p>Building cross-platform mobile applications that work on iOS & Android</p>
    <br />
    
    <ul class="download-a a">
    <!--<li class="as"><a class="top-nav-button"  href="" target="_blank">Sign up</a></li>-->
      <?php   
   
               if($new_ar=='GB'){ 
      echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R3SBRE8ACSLQS" target="_blank">Sign Up</a></li>'; 
          }
    
    
      else if($new_ar=='US'){ 
      echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MQLABDM2K4Z7S" target="_blank">Sign Up</a></li>'; 
          }
		  
 
 else if($new_ar=='AT'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}
 
else if($new_ar=='GE'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='FR'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='IT'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}
 

else if($new_ar=='NO'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='ES'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

 
 else{  
        echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MQLABDM2K4Z7S" target="_blank">Sign Up</a></li>';
       }

?>

    
    </ul>
    
  </article>
  <section id="content" class="a">
    <!--<article>
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
    </article>-->
    <article>
      <header class="heading-a">
        <h3><span class="strong">Mobile Apps</span></h3>
        <p>Push, Tap, Call, Find ...Mobile made easy</p>
      </header>
      <ul class="list-a">
        <li><a href="http://www.socialspark.biz/hi-tea-boutique-ecommerce/index.html" target="_blank">
        <img src="img/click-to-call.png" alt="" />
         <span class="title">Push Notifications</span>
         <div class="separator-theme-color"></div>
          <div>Alert your customers by updating them with the latest events, exciting offers etc. Push notifications keep them updated.</div>
          </a><br />
         <!-- <p class="blue-button"><a href="http://www.socialspark.biz/hi-tea-boutique-ecommerce/index.html" target="_blank">View Example</a></p>-->
        </li>
        <li><a href="http://www.socialspark.biz/sapporo-teppanyaki-booking-reservation/index.html" target="_blank">
        <img src="img/booking.png" alt="" />
         <span class="title">Bookings on the Go</span>
         <div class="separator-theme-color"></div>
          <div>Want to Book? Just Click and Go. Seamless bookings at your finger tips.</div>
          </a><br />
          <!--<p class="blue-button"><a href="http://www.socialspark.biz/sapporo-teppanyaki-booking-reservation/index.html" target="_blank">View Example</a></p>-->
        </li>
        <li><a href="http://www.socialspark.biz/hd-brows-appointment/index.html" target="_blank">
        <img src="img/services.png" alt="" />
        <span class="title">Services </span>
        <div class="separator-theme-color"></div>
          <div>Update customers about your services, prices, products and add a description for a simple overview of your business.</div>
          </a><br />
          <!--<p class="blue-button"><a href="http://www.socialspark.biz/hd-brows-appointment/index.html" target="_blank">View Example</a></p>-->
        </li>
        <li><a href="http://www.socialspark.biz/telunas-resorts-quiz/index.html" target="_blank">
        <img src="img/services.png" alt="" />
         <span class="title">Loyalty</span>
         <div class="separator-theme-color"></div>
          <div>Reward customers with loyalty points every time they pay a visit and surprise them with Gift vouchers and existing offers.</div>
          </a><br />
        </li>
        <li><a href="http://www.socialspark.biz/brit-olom-photo-contest/index.html" target="_blank">
        <img src="img/maps.png" alt="" />
         <span class="title">Maps</span>
         <div class="separator-theme-color"></div>
          <div>Direct your customers from anywhere. Turn-to-turn direct to your front door through GPS.</div>
          </a><br />
        </li>
        <li><a href="http://www.socialspark.biz/kenko-wellness-coupons/index.html" target="_blank">
        <img src="img/click-to-call.png" alt="" />
         <span class="title">Click-2-Call</span>
         <div class="separator-theme-color"></div>
          <div>Give customers multiple ways to get in touch with your business.</div>
          </a><br />
        </li>
        <li><a href="http://www.socialspark.biz/lny-properties-email/index.html" target="_blank">
        <img src="img/sme.png" alt="" />
         <span class="title">Benefit for SMEs</span>
         <div class="separator-theme-color"></div>
          <div>Mobile marketing is cost efficient and produces the highest rate of return.</div>
          </a> <br />
        </li>
        <li><a href="http://www.socialspark.biz/artify-instagram/index.html" target="_blank">
        <img src="img/digital-advertising.png" alt="" />
        <span class="title">Digital Advertising</span>
        <div class="separator-theme-color"></div>
          <div>The explosion of Smartphone users provide businesses with unique sales, marketing, and communication opportunities to maximise your advertising dollars.</div>
          </a> <br />
        </li>
        <li><a href="#">
        <img src="img/cms.png" alt="" />
         <span class="title">CMS Integration</span>
         <div class="separator-theme-color"></div>
          <div>Content management system (CMS) capable of storing and delivering content and services to mobile apps.</div>
          </a> <br />
        </li>
      </ul>
    </article>
    <article class="va unscrolled shown" >
      <header class="heading-a">
        <h3><span class="strong">Why Mobile?</span></h3>
      </header>
      <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div data-animated="0" class="skill animated-in">
          <div class="name ">Mobile Internet penetration</div>
          <div class="bar">
            <div class="value" style="width: 64%;">
              <div class="count">64</div>
            </div>
          </div>
        </div>
        <div data-animated="0" class="skill animated-in">
          <div class="name ">Smartphone penetration</div>
          <div class="bar">
            <div class="value" style="width: 88%;">
              <div class="count">88</div>
            </div>
          </div>
        </div>
        <div data-animated="0" class="skill animated-in">
          <div class="name ">Contact local businesses over mobile</div>
          <div class="bar">
            <div class="value" style="width: 77%;">
              <div class="count">77</div>
            </div>
          </div>
        </div>
        <div data-animated="0" class="skill animated-in">
          <div class="name ">Click on mobile advertisements</div>
          <div class="bar">
            <div class="value" style="width: 70%;">
              <div class="count">70</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div data-animated="200" class="skill animated-in">
          <div class="name ">Researching Products Over Mobile</div>
          <div class="bar">
            <div class="value" style="width: 87%;">
              <div class="count">87</div>
            </div>
          </div>
        </div>
        <div data-animated="200" class="skill animated-in">
          <div class="name ">iPhone penetration</div>
          <div class="bar">
            <div class="value" style="width: 73%;">
              <div class="count">73</div>
            </div>
          </div>
        </div>
        <div data-animated="200" class="skill animated-in">
          <div class="name ">E-Commerce Over Mobile Device</div>
          <div class="bar">
            <div class="value" style="width: 44%;">
              <div class="count">44</div>
            </div>
          </div>
        </div>
        <div data-animated="200" class="skill animated-in">
          <div class="name ">Social Media Over Mobile</div>
          <div class="bar">
            <div class="value" style="width: 47%;">
              <div class="count">47</div>
            </div>
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
        <h3><span class="strong">PORTFOLIO</span></h3>
      </header>
      <div id=carousel-04 class="carousel slide carousel-04" data-ride=carousel>
      <ol class=carousel-indicators>
        <li data-target="#carousel-04" data-slide-to=0 class=active></li>
        <li data-target="#carousel-04" data-slide-to=1></li>
        <li data-target="#carousel-04" data-slide-to=2></li>
        <li data-target="#carousel-04" data-slide-to=3></li>
      </ol>
      <div class="carousel-inner text-center">
        <div class="item active">
          <div class=row>
            <div class="col-lg-4 col-sm-4 col-xs-12"><img src="images/portfolio/portfolio-01.jpg" alt="">
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Molly Roffey's</strong></h4>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12"><img src="images/portfolio/portfolio-06.jpg" alt="">
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Hilton Gifts</strong></h4>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12"><img src="images/portfolio/portfolio-05.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Lavender Spa</strong></h4>
              </div>
            </div>
          </div>
        </div>
        <div class=item>
          <div class=row>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-02.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Madame Patisserie</strong></h4>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-03.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Muse Arts</strong></h4>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-04.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Jurlique Spa</strong></h4>
              </div>
            </div>
          </div>
        </div>
        <div class=item>
          <div class=row>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-07.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Ipanema Pub</strong></h4>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-08.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Shine Korea</strong></h4>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-09.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Headlines Hairdressing</strong></h4>
              </div>
            </div>
          </div>
        </div>
        <div class=item>
          <div class=row>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-10.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>2B Printing</strong></h4>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-11.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Teka Restaurant</strong></h4>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12"> <img src="images/portfolio/portfolio-12.jpg" alt=...>
              <div class=portfolio-thumb-name>
                <h4 class=text-theme-color><strong>Han Dynasty Spa</strong></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
       
    </article> 
    <article class="vb">
      <header class="heading-a">
        <h3><span class="strong">We like our customers and they like us too!</span></h3>
      </header>
      <ul class="slider-a">
        <li><img src="images/t-1.jpg" alt="Placeholder" width="157" height="157"><span class="title"><span>Phillip McKee</span> <!--Digital Designer--></span>We have seen a marked increase in customer’s downloading our mobile app ever since it has launched.  It definitely has set us apart from the competition and taken our marketing to a new level. </li>
        <li><img src="images/t-2.jpg" alt="Placeholder" width="157" height="157"><span class="title"><span>Lorenz Wilkerson</span> </span> We knew nothing about mobile apps. We just knew we had to get one. Dealing with the team at Social Circle has been a pleasure, from developing to marketing the app. We highly recommend Social Circle.</li>
        <li><img src="images/t-3.jpg" alt="Placeholder" width="157" height="157"><span class="title"><span>Suzy Carrol</span> </span>Working with Social Circle on our mobile app was easy.  Not only did they provide us with excellent service throughout the development process, but were also diligent about providing a follow-up service.  The entire team was very pleasant to work with.</li>
      </ul>
    </article>
    <div>
      <header class="heading-a">
        <h3><span class="strong">FAQs</span> </h3>
      </header>
      <div class="faq-l">
        <h6 class="margin-bottom-5" >Why a mobile app?</h6>
        <p>A mobile app can increase revenue, social media engagement, visit frequency to your location, customer satisfaction and can have many other benefits.  Mobile apps for small businesses are valuable and extraordinarily cost-effective.</p>
        <br />
       
        <br />
        <h6 class="margin-bottom-5" >What features will my business mobile app have?</h6>
        <p> <strong>Push Notifications - </strong> Send attractive and customized promotions, coupons, and event invites to customers through our advanced push notification system.<br />
<strong>Loyalty Program -</strong> Reward your regulars.<br />
<strong>One-Touch Dialing -</strong> Customers can call your business with a single click
Mobile eCommerce. <!--Customers can submit orders directly through your app.--><br />
<strong>Food Ordering / Mobile Reservations - </strong> If you’ve got a restaurant, you can provide your customers with total convenience.<br />
<strong>Social Media Integration -</strong> Customers can refer their friends through social media.<br />
<strong>Map -</strong> To lead people right to your location.<br />
<strong>Image Gallery -</strong> A photo album of your business.</p>
        
      </div>
      <div class="faq-r">
        <h6 class="margin-bottom-5">What other services does my mobile app provide?</h6>
        <p>Submission to the app store(s) of your choice. Maintenance, support and regular updates of your mobile app.
Promotion of your mobile app.</p>
        <br />
        <h6 class="margin-bottom-5">How long will it take for my app to be live?</h6>
        <p>Once created, we will submit your app to the iTunes App Store or Google Play Store. It  takes about a week to 10 days  to gain approval from the respective stores. Our account manager will keep you updated on the progress.</p>
        <br />
         <h6 class="margin-bottom-5" >Are mobile apps suitable for small businesses like mine?  </h6>
        <p>Mobile technology is growing very quickly, and is already overtaking desktop computing in many places. If you want to connect with your customers, mobiles are fast-becoming the most popular channel available, specially for small businesses.</p>     
      
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
        <h3><span class="strong">Customize your first app for free!</span></h3>
      </header>
      <ul class="list-c">
      <!--<li class="as"><a class="top-nav-button"  href="" target="_blank">Sign up</a></li>-->
        
       <!-- <li> <a href="https://www.2checkout.com/checkout/purchase?sid=102680797&quantity=1&product_id=1" target="_blank">Start for $1</a> </li>-->

       <?php   
   
               if($new_ar=='GB'){ 
      echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R3SBRE8ACSLQS" target="_blank">Sign Up</a></li>'; 
          }
    
    
      else if($new_ar=='US'){ 
      echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MQLABDM2K4Z7S" target="_blank">Sign Up</a></li>'; 
          }
		  
 
 else if($new_ar=='AT'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}
 
else if($new_ar=='GE'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='FR'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='IT'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}
 

else if($new_ar=='NO'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

else if($new_ar=='ES'){  
     echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ETYBYYVXCHTSU" target="_blank">Sign Up</a></li>';

}

 
 else{  
        echo '<li class="as"><a class="top-nav-button" accesskey="5" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=MQLABDM2K4Z7S" target="_blank">Sign Up</a></li>';
       }

?>






      </ul>
      <!--<p class="text-center">Start for $1 for the first month. After that it will be $99 a month. No contracts. Cancel anytime.</p>-->
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
        <div class="text1">Social Circle offers comprehensive mobility solutions catering to unique requirements of small businesses. With growing popularity of smartphones it has become essential for businesses to offer smooth mobile experiences to their customers. We build and market customized mobile applications for Android and IOS increasing brand reach, engagement and revenue.</div>
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
    <p style="padding-top: 35px;"><a href="../terms_conditions/">Terms & Conditions</a></p>
    <p>&copy; <span class="date">2015</span> Social Circle. All rights reserved. <!--<a href="./">Privacy Policy</a> <a href="./">Terms of Service</a>--></p>
  </footer>
</div>
<script>
 head.load('javascript/tf.js','javascript/scripts.js','javascript/mobile.js')
 //head.load('javascript/jquery.js','javascript/tf.js','javascript/scripts.js','javascript/mobile.js')
</script> 
<script src="javascript/1.8.2.jquery.min.js"></script>
<script src="javascript/jquery-1.js"></script> 
<script src="javascript/util.js"></script> 
<script src="javascript/lib.js"></script>
<script src="javascript/bootstrap.min.js"></script>  
<script src="javascript/gnmenu.js"></script> 
<script src="javascript/common.js"></script>
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