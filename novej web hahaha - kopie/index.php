<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Autopůjčovna</title>
</head>
<body>

   
    <div class="navbar">
       <div class="container">
           <a class="logo"href="index.html">Logo</a>

           <img id="svgmenu" class="mobile-menu" src="img/menu.svg" alt="menu">
          
           <nav>
               <img id="svgcross" class="menu-exit" src="img/cross.svg" alt="cross">
               <ul class="prvniLinky">
                   <li><a href="#">Domů</a></li>
                   <li><a href="#">Vozový park</a></li>
                   <li><a href="#">Podmínky</a></li>
                   <li><a href="#">Dárkový poukaz</a></li>
               </ul>
               <ul class="druhyLinky">
                <li><a href="#">Kontakt</a></li>
                <li><a href="kosik.php">Košík</a></li>
                <li><a href="login.php">Přihlásit</a></li>
               </ul>
           </nav>
       </div>
    </div>
    
    <div class="auta-banner">
        <img src="img/cars.jpg" alt="">
    </div>


    <section class="hero">
        <div class="container">
            <p class="wanna-car"> Chcete si půjčit luxusní vozidlo?</p>
            <h1>Autopůjčovna</h1>

            <div class="hero-cta">
                <a href="#" class="button">Nabídka</a>
            </div>

            
    </div>
    </section>
    
    <section class="cars-menu">
    <div class="auto1">
        <h2>Dodge challenger Demon</h2>
        <img src="img/auto-cer.jpeg" class="autocer" alt="">
            <div class="vybrat">
                <p class="cena">999KČ</p>
                <a href="kosik.php" class="vybrat-button">Vybrat</a>
            </div>
    </div>

    <div class="auto2">
        <h2>Dodge challenger Demon</h2>
        <img src="img/auto-zel.jpeg" class="autozel" alt="">
        <div class="vybrat">
            <p class="cena">999KČ</p>
            <a href="kosik.php" class="vybrat-button">Vybrat</a>
        </div>
        
    </div>

    <div class="auto3">
        <h2>Dodge challenger Demon</h2>
        <img src="img/auto-bil.jpg" alt="">
        <div class="vybrat">
            <p class="cena">999KČ</p>
            <a href="kosik.php" class="vybrat-button">Vybrat</a>
        </div>
        
    </div>

    <div class="auto4">
        <h2>Dodge challenger Demon</h2>
        <img src="img/auto-cest.png" alt="">
        <div class="vybrat">
            <p class="cena">999KČ</p>
            <a href="kosik.php" class="vybrat-button">Vybrat</a>
        </div>
    </div>
   <br>
    </section>

    <section class="psani">
        <div class="container">
            <ul class="features-list">
                <li>Rychlá a spolehlivá domluva!</li>
                <li>Široký výběr vozů!</li>
                <li>Jízdy po celé ČŘ i v zahraničí!</li>
                <li>Vhodné jako dárek!</li>

            </ul>

        </div>
    </section>
    <section class="poukaz">
        <div class="container">
            <h1 class="darkpou">Dárkový poukaz</h1>
            <p class="poukaz-text">Jako novinku vám nabízíme nadupané dárkové poukazy!<br>

                Ideální jako dar, díky kterému pomůžete svým blízkým, splnit si svůj sen.<br> Využít jej můžete na jakékoli nabízené služby a vozy z naší garáže.</p>
            <img src="img/poukaz.jpg" alt="autopoukaz">
            
            

        </div>
    <!--tady je auto poukaz-->
    </section>

    <!--formulář-->
    <section class="contact-section">
        <div class="coutainer">
            <div class="contact-left">
                <h2 class="contactus">Kontaktujte nás!</h2>
                <form action="">
                    <label for="name">Jméno</label>
                    <input type="text" id="name" name="name">

                    <label for="email">Váš e-mail</label>
                    <input type="email" id="email" name="email">

                    <label for="message">Váš dotaz</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>

                    <input type="submit" class="send-message" value="Odeslat">
                </form>
            </div>
            <div class="contact-right">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1300.856308800435!2d16.65159260171853!3d49.3007868541838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47129274cef478d3%3A0x2db7278b49916ebe!2zTsOhZHJhxb5uw60gMTE1LCA2NzkgMDQgQWRhbW92!5e0!3m2!1scs!2scz!4v1637070495313!5m2!1scs!2scz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

    </section>
    <!--formulář-->

    <script>
    const mobileBtn = document.getElementById('svgmenu')
        nav = document.querySelector('nav')
        mobileBtnExit = document.getElementById('svgcross');

    mobileBtn.addEventListener('click', () => {
        nav.classList.add('menu-btn');
    })

    mobileBtnExit.addEventListener('click', () => {
        nav.classList.remove('menu-btn');
    })

    </script>
</body>
</html>