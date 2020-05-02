<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

include('header.php');
$page_title = 'Project ABCD > About'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> ABCD About Us </title>
</head>

<style>
    .image {
        width: 200px;
        height: 200px;
        padding: 20px 20px 20px 20px;
    }


    #title {
        text-align: center;
        color: darkgoldenrod;
    }

    #table_1 {
        border-spacing: 100px 0px;
    }

    .directions {
        text-align: center;
        padding: 20px 40px 0px 40px;
        color: darkgreen;
    }

    .description {
        padding: 0px 40px 0px 0px;
        color: darkgoldenrod;
    }

    #silc {
        width: 300;
        height: 85;
    }

    .Name {
        color: darkgreen;
    }
</style>

<body>
    <!--this is the tool bar-->

    <h2 id="title">About Us</h2>

    <h4 class="directions">Project ABCD was created in the 2019-2020 school year by the current SILC CS320 (PHP) class students. Each of us have contibuted to the creation of the website by completing one functionality individually. We have then pushed our updates to Github where there is a ongoing Project ABCD application. We used GitHub to download the master baseline and to integrate our changes. This year we also created our own webaddress using Blue Host. Enjoy! <br> </h4>

</body>

<script>

    //Everyonce can fill in their own information:
    //Href is for more specific bio if they want to incorportate one.

    function Student(href, name, image_src, description) {
        this.href = href;
        this.name = name;
        this.image_src = image_src;
        this.description = description;

        this.toString = function () {
            document.write("<table class = 'table_2'>");
            document.write("<tr>");
            document.write("<td><a href ='" + this.href + "' title = '" + this.name + "'><image class = 'image' src='" + this.image_src + "'></image></a></td>");
            document.write("<td><h2 class = 'Name'>" + this.name + "</h2><h4 class = 'description'>" + this.description + "</h4></td>");
            document.write("</tr></table>");
        }
    }



var s1 = new Student(
      "",
      "Anjneya Kumar",
      "images/about_images/sample_image.png",
      "Anjneya is currently an 8th grader at Chippewa Middle School. He attends Hindi 4, CS320 (PHP), and teaches the beginner's class for Tabla at SILC. He enjoys playing games, swimming, trying new foods, sleeping, and spending time with friends and family."
      );

      var s3 = new Student(
      "",
      "Anu Kumble",
      "images/about_images/AnuradhaKumble.jpg",
      "Anu and her family have been part of SILC for nine years . Her primary goal in joining SILC was to have daughter, Ria, be comfortable in reading and writing Hindi along with conversing in the language especially in India. Along with her professional role of a Business Analyst, she has taken up the role of a Co-Editor of the Yearbook in 2018-19 and played a lead role in implementing the SILC Library with over 400 books in 2017. Anu joined the PHP class as she enjoys learning different aspects of the IT industry and took it up as a challenge and found that she enjoys the class very much. She also enjoys reading books, blogs, solving riddles & crosswords, observing nature and watching movies. "
      );

      var s5 = new Student(
      "",
      "Ishana Didwania",
      "images/about_images/ishana.jpg",
      "Ishana Didwania is an 8th grader at Mahtomedi Middle School. She enjoys being a part of her school’s Mathcounts and Girls Who Code team. She loves music and is a member of the Upper Midwest Flutes Association (UMFA). Ishana is also part of the community at the School of India for Languages and Cultures (SILC), where she teaches Hindi and learns computer science. In her spare time, she enjoys being outside and spending time with her family and friends."
      );

      var s4 = new Student(
      "",
      "Siva Jasthi",
      "images/about_images/siva.jpg",
      "Dr. Jasthi is the primary instrutor for CS3 (PHP/MySQL) class. He has been working in the software industry in different capacities for the last 25 years. He is currently working as a Consultant in Siemens PLM Software Inc. For the last 20 years, he is serving as adjunct faculty in the Department of Computer Sciences and Cyber Security at Metropolitan State University (MN, USA). For the last 14 years, he has been an active volunteer at School of India for Languages and Culture (SILC) and offered his services as a Telugu Teacher, Webmaster, Principal, and President. He is currently serving on the SILC board of directors as Director of Technology. He is building a five-level Digital Literacy program for middle and high school students at SILC."
      );

      var s6 = new Student(
      "",
      "Deepta Jasthi",
      "images/about_images/deepta.jpg",
      "Deepta Jasthi is currently a senior at Mounds View High School. At school, she is involved in activities such as Science Olympiad, National Honor Society, cross country running, and DECA. She is participating in Science Olympiad and DECA nationals this spring. She attends the School of India for Languages and Culture (SILC) for computer science classes because she wants to explore her interests. Deepta is also interested in the arts. She has been learning Bharatanatyam for the past ten years and has performed at several community events in the twin cities, MN. Her passion for music has led her to learn piano for the past ten years, where she has won state competitions. She also participates in Figure Skating at the White Bear Lake Sports Center.  She volunteers as a mentor at the 4-H Tech Wizards program that engages youth in small group mentoring around technology and STEM concepts. Outside of her academic and artistic pursuits, Deepta enjoys being a part of the Girl Scouts Program, traveling and spending time with family and friends. She will be going to University of California, Berkeley in Spring 2020"
      );

      var s7 = new Student(
      "",
      "Lathika Sharma",
      "images/about_images/sample_image.png",
      "Sample Text"
      );

      var s8 = new Student(
      "",
      "Madhuri Seemakurty",
      "images/about_images/madhuri.jpg",
      "Madhuri Seemakurthy is TItle/CERF paraprofessional at Centennial school District.  She is teaching Telugu Level 1 class at SILC for the past 3 years.  She enjoys teaching and spending time with my family.  She and her family enjoy volunteering with twin cities non-profit organizations"
      );

    var s10 = new Student(
      "",
      "Maheswara Sunkara",
      "images/about_images/sample_image.png",
      "Sample Text"
      );

      var s11 = new Student(
      "",
      "Pravallika Sunkara",
      "images/about_images/pravallika.jpg",
      "Pravallika Sunkara is currently in 9th grade and goes to Eastridge High, in Woodbury MN. She is a classical and bollywood dancer. And her hobbies are art, music, and dance. Pravallika knows how to play 5 instruments, they are piano, violin, flute, ukulele, and the recorder. She has won 1st place painting 4 years in a row for the ugadi TEAM competitions. She attends the School of India Languages and Culture (SILC) to learn telugu, javascript, and dance. She has been attending SILC for the past 4 years."
      );

      var s9 = new Student(
      "",
      "Nikhitha Gollamundi",
      "images/about_images/nikhitha.jpeg",
      "Nikhitha Gollamudi is a current junior at Eastview High School. She is actively involved in her school's Classic Debate team and National Honors Society. Outside of school she enjoys dancing and reading. Nikhitha has been learning Bharatanatyam for the past 10 years and has performed at several fundraisers, events, and competitions in the community. She also volunteers at her local hospital and works at Kumon, a tutoring center. "
      );

      var s12 = new Student(
      "",
      "Raja Gollamundi",
      "images/about_images/RajaGollamundi.jpg",
      "Raja Gollamudi helped in integrating and testing the PHP project for SILC 2020 class. He has been working in the software industry for over 25 years. He is currently working as a Principal Consultant at Magenic Technologies. He has been a volunteer at School of India for Languages and Culture (SILC) and offered his services as a Telugu Teacher"
      );

      var s13 = new Student(
      "",
      "Smriti Samtani",
      "images/about_images/smriti.jpg",
      "Smriti Samtani is a sophmore at Mahtomedi High School. She has been a part of Silc for 2 years and absolutely loves it. In school, she is a part of the Swim and Dive team as a diver and participates in clubs in her spare time. One of her favorite after school activity is robotics. She loves the atmosphere and all of the amzing people she works with. Outside of school she loves to paint, take pictures, sing, dance, (basically all of the arts) but she is most passionate about drawing. Smriti also loves to ride her bike and rollerblade when she has the chance. Overall, Smriti is very lucky to have been presented with so many opportunities in her life and is grateful for all of them."
      );

      var s14 = new Student(
      "",
      "Vishnu Vundamati",
      "images/about_images/vishnu.jpg",
      "Vishnu Vundamati is a freshman at a school in Woodbury, MN. He loves to learn about world history and be in the natural outdoors. Vishnu has been learning Carnatic Music for the past six years. He has performed twice for Indian Raga Labs, and will be performing in Cleveland, OH for the Thyagaraja Music Festival this April. Vishnu attends SILC(School of Indian Language and Culture) every Saturday and learns Hindi, Computer Science, and Tabla. Vishnu also likes to learn the piano and has been doing so for the past seven years. Vishnu has played in the Minnesota State Honors Concert five times, and hopes to one day win the Minnesota Young Artist competition. He hopes to continue playing the piano for the rest of his life. Other than piano Vishnu learns Taekwondo and achieved a black belt in 2017."
      );

      var s16 = new Student(
      "",
      "Ria Koppikar",
      "images/about_images/ria.jpg",
      "Ria Koppikar is currently a sophomore at Eastview High School. At school, she is involved in many activities, including; Speech, Debate, DECA, and National Honors Society. This was her first year in DECA, and she participated in the State competition. Ria has been attending SILC since the age of 7, and she has learned and grown as a student and person. She thoroughly enjoys teaching, and this year she was an assistant Hindi teacher at SILC. Ria also has a passion for dance and does it through SILC as well. In her spare time, she enjoys spending time with family and friends, doing calligraphy, and traveling"
      );

      

    
    function printoutStudents() {
        return s1.toString() + 
               s3.toString() +
               s4.toString() + 
               s5.toString() +
               s6.toString() +
               s8.toString() +
               s9.toString() +
               s10.toString() +
               s11.toString() +
               s12.toString() +
               s13.toString() +
               s14.toString() +
               s16.toString() ;
               
    }

    printoutStudents();
</script>
</body>