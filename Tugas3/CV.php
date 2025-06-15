<?php

$education = [
    "SMP Al-Azhar 13 Surabaya (2019-2021)",
    "SMA Muhammadiyah 2 Surabaya (2021-2023)",
    "Universitas Pembangunan Nasional “Veteran” Jawa Timur (2023 - Sekarang)"
];

$skills = [
    "General Skills: Berpikir kritis, mampu menganalisis, mampu beradaptasi", 
    "Bahasa Pemrograman: C++, HTML, CSS, Java",
    "Microsoft Office: Word, PowerPoint, Excel"
];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>CV Noval Aditya</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/text.css">
    <link rel="stylesheet" href="css/960.css">
    <link rel="stylesheet" href="styles.css">

</head>
<body id="top"> 

    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li> 
                <li><a href="#about-me">About Me</a></li>
                <li><a href="#education">Education</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section id="home">
            <div class="container">
                <div class="description">
                    <h1>Noval Aditya</h1>
                    <p>Mahasiswa dari UPN “Veteran” Jawa Timur yang memiliki ketertarikan dalam teknologi.</p>
                </div>
                <img src="img/image1.jpg" alt="Noval Aditya" class="profile-image"/>
            </div>
        </section>

        <section id="about-me" class="full-screen container_12">
            <h2>About Me</h2>
            <div class="content-box">
                <p>Saya adalah seorang mahasiswa Informatika di UPN "Veteran" Jawa Timur dengan program studi Informatika karena saya tertarik terhadap teknologi baru yang selalu berubah sepanjang waktu. 
                   Saya memiliki hobi untuk mengisi waktu senggang yaitu bermain game dan juga menonton film. Saya juga sering menggunakan Microsoft Office, termasuk Excel dan PowerPoint, untuk keperluan tugas dari kampus saya.
                </p>
            </div>
        </section>

        <section id="education" class="full-screen container_12">
            <h2>Education</h2>
            <div class="content-box">
                <ul>
                <?php foreach ($education as $edu) echo "<li>$edu</li>"; ?>
                </ul>
            </div>
        </section>

        <section id="skills" class="full-screen container_12">
            <h2>Skills</h2>
            <div class="content-box">
                <ul>
                    <?php foreach ($skills as $skill) echo "<li>$skill</li>"; ?>
                </ul>
            </div>
        </section>

        <section id="contact" class="full-screen container_12">
            <h2>Contact</h2>
            <div class="content-box">
                <p>Telepon: (+62) 8113012333</p>
                <p>Email: 23081010173@student.upnjatim.ac.id</p>
            </div>
        </section>

    </main>

</body>
</html>
