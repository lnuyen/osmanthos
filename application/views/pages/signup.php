<head>

    <title><?php echo $title ?> | Scent Market</title>
    <link rel="shortcut icon" href="<?=base_url('/favicon.ico')?>" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <script src="<?php echo base_url('assets/public/js/jquery-1.8.2.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/public/js/global.js');?>" type="text/javascript"></script>

    <style>

        html {
            background: url(<?php echo base_url('assets/public/images/dahlias-lg.jpg'); ?>) repeat-x center center;
            margin: 0 auto;
        }
        body {
            font-family: 'Open Sans', arial, sans-serif;
            margin: 0 auto;
        }
        h1{
            font-family: 'Courier New', courier, serif;
            font-weight: lighter;
            color: #ffffff;
            font-size: 4.0em;
        }
        h2 {
            color: #ff482c;
            text-transform: uppercase;
        }
        h3 {
            color: #111111;
        }
        p {
            color: #111;
            font-size: 12px;
        }
        div#title {
            margin-top:40px;
            text-align: center;
            width: 100%;
        }
        div#welcome {
            position: absolute;
            top: 30%;
            left: 30%; /*left: 5%;*/
        }
        div.peek_div {
            position: absolute;
            top:30%;
            left:30%; /*right: 5%;*/
            background-color: #ffffff;
            opacity: 0.8;
            height:295px;
            width:460px;
            padding: 10px 20px;
            display:none;
        }
        div#links{
            position: absolute;
            top: 24%;
            width: 100%;
            text-align: center;
        }
        div#peek_div_join {
            text-align: center;
        }
        div#peek_div_join h2 {
            margin-top: 80px;
        }
        #links a {
            color: #FFFFFF;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.1em;
            padding: 0 30px;
            text-decoration: none;
            text-transform: uppercase;
        }
        #links a:hover,
        #links a.selected {
            color: #feff74;
        }
        #email_submit{
            background-color: #ff482c;
            border: none;
            color: #ffffff;
            padding: 8px;
            text-transform: uppercase;
            width: 80px;
        }
        #email_submit:hover {
            background-color: #c13721;
            cursor: pointer;
        }
        #email {
            width: 200px;
            padding: 8px;
            background-color: #ffffff;
        }
        label {
            font-size: 12px;
        }
        input {
       	    height:30px;
       	    width:180px;
        }
        #footer {
            position: absolute;
            bottom: 20px;
            text-align: center;
            width: 100%;
        }
        #footer a,
        #footer {
            color: #feff74;
            text-decoration: none;
            font-size: 12px;
        }
        #footer a:hover {
            color: #ffffff;
        }
    </style>

</head>

<body>
    <div id="title">
        <h1>scent market</h1>
    </div>
    <div id="links">
        <a class="peek_" name="what" href="#">WHAT</a>
        <a class="peek_" name="why" href="#">WHY</a>
        <a class="peek_" name="who" href="#">WHO</a>
        <a class="peek_" name="join" href="#">SIGNUP</a>
    </div>
    <div id="welcome">
        <img id="welcome_image" src="<?php echo base_url('assets/public/images/peek_welcome.png'); ?>" />
    </div>
    <div class="peek_div" id="peek_div_what">
        <h2>What</h2>
        <h3>Create Amazing Fragrance</h3>
        <p>Fragrance is one of the most personal products you own&#8212well what's more special than something unique created by you?<br /><br />Most people have no idea how to begin to create a fragrance. Scent Market is changing everything. We've put all of the information and tools in one place to make it easy and fun to create your own personal fragrance.<br /><br/>We guide you through the process and do all the heavy lifting to help you create the perfect fragrance. All you need is a computer, curiosity, and the desire to create something completely unique.</p>
    </div>
    <div class="peek_div" id="peek_div_why">
        <h2>Why</h2>
        <h3>Make It Personal</h3>
        <p>Until now, fragrance creation was left to professional perfumers, hobbyists and people with money to burn.<br /><br />It's difficult to create your own fragrance without access to thousands of dollars for a bespoke service. You need raw materials, lab supplies, and an idea of what the hell you're doing!<br /><br />We're applying our experience in the fragrance and tech industries to make it easy. Scent Market makes it simple and fun to create wonderful fragrances that are completely unique&#8212and smell great!</p>
    </div>
    <div class="peek_div" id="peek_div_who">
        <h2>Who</h2>
        <h3>Founder&#8212Laura Nuyen</h3>
        <p>After college, I headed to France and spent two years immersed in the science, culture and history of fragrance. It was incredible, to say the least. Back in the US, I witnessed the talents of world class perfumers while working at one of the top fine fragrance studios in New York City. The experience allowed me to see the creative process develop from an idea to a finished product.<br /><br />But I was shocked by the amount of products being pushed into the market and the loss of focus on the individual within the industry. I felt there had to be a better way to make fragrance personal again. Welcome to Scent Market :)</p>
    </div>
    <div class="peek_div" id="peek_div_join">
        <h2>Coming Soon</h2>
        <h3>Signup For News & Updates.</h3>
        <form action="http://thescentmarket.us5.list-manage.com/subscribe/post?u=ebe2b7e83945317e263fec96c&amp;id=32916f01f5" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" >
            <label for="mce-EMAIL"></label>
            <input type="email" name="EMAIL" id="mce-EMAIL" value="Enter Your Email..." onfocus="if (this.value=='Enter Your Email...') this.value='';" />
            <input type="submit" name="subscribe" id="email_submit" value="submit">
        </form>
    </div>
    <div id="footer">
        <a href="http://twitter.com/scentmarket">Twitter</a> | <a href="http://pinterest.com/scentmarket">Pinterest</a> | <a href="http://blog.thescentmarket.com">Tumblr</a>
    </div>
</body>