<?php
// A little list of rotating hero tips — one shows each day automatically.
$tips = [
    "Small steps make big heroes! Try drinking an extra glass of water today.",
    "Try going to bed 15 minutes earlier tonight for super-charged sleep.",
    "Add one new colorful veggie or fruit to your plate today.",
    "Take a 10 minute dance break — your heart will thank you!",
    "Tell a grown-up you trust about something you're feeling today.",
    "Wash your hands with soap for as long as it takes to sing your favorite song.",
    "Stretch like a superhero when you wake up to wake your whole body up.",
];
$todayIndex = date('N') - 1; // 0 = Monday ... 6 = Sunday
$tipOfTheDay = $tips[$todayIndex];
$currentYear = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Healthy Heroes — Be Strong, Be Happy, Be You!</title>
<style>
  :root{
    --sky:#5FC9F3;
    --sun:#FFC93C;
    --leaf:#5BC97E;
    --berry:#FF6B6B;
    --grape:#9B6BFF;
    --cream:#FFFBF2;
    --ink:#2B2640;
  }

  *{ box-sizing:border-box; margin:0; padding:0; }

  body{
    font-family:'Trebuchet MS', 'Segoe UI', Verdana, sans-serif;
    background:var(--cream);
    color:var(--ink);
    line-height:1.6;
    overflow-x:hidden;
  }

  h1, h2, h3{
    font-family:'Trebuchet MS', 'Segoe UI', Verdana, sans-serif;
    font-weight:900;
  }

  img, svg{ display:block; }

  a{ color:inherit; }

  /* ---------- NAV ---------- */
  nav{
    position:sticky;
    top:0;
    z-index:100;
    background:var(--cream);
    border-bottom:4px solid var(--ink);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:14px 28px;
  }
  .logo{
    display:flex;
    align-items:center;
    gap:10px;
    font-size:1.4rem;
    font-weight:900;
  }
  .logo .star{ font-size:1.6rem; }
  .nav-links{
    display:flex;
    gap:8px;
    list-style:none;
  }
  .nav-links a{
    text-decoration:none;
    font-weight:700;
    padding:8px 16px;
    border-radius:999px;
    border:3px solid var(--ink);
    background:white;
    transition:transform .15s ease, background .15s ease;
    font-size:.95rem;
  }
  .nav-links a:hover{
    background:var(--sun);
    transform:translateY(-2px);
  }

  /* ---------- HERO ---------- */
  .hero{
    position:relative;
    padding:70px 28px 100px;
    text-align:center;
    background:
      radial-gradient(circle at 15% 20%, rgba(255,201,60,.35), transparent 40%),
      radial-gradient(circle at 85% 15%, rgba(91,201,126,.3), transparent 40%),
      var(--sky);
    overflow:hidden;
    border-bottom:6px solid var(--ink);
  }
  .hero-cloud{
    position:absolute;
    width:140px;
    opacity:.9;
    animation:drift 30s linear infinite;
  }
  @keyframes drift{
    from{ transform:translateX(-200px); }
    to{ transform:translateX(110vw); }
  }
  .hero h1{
    font-size:clamp(2.2rem, 6vw, 4rem);
    color:white;
    text-shadow:3px 3px 0 var(--ink);
    margin-bottom:18px;
    position:relative;
  }
  .hero p{
    max-width:560px;
    margin:0 auto 32px;
    font-size:1.2rem;
    color:white;
    font-weight:700;
    text-shadow:1px 1px 0 rgba(0,0,0,.2);
    position:relative;
  }
  .hero-btn{
    position:relative;
    display:inline-block;
    background:var(--berry);
    color:white;
    font-weight:900;
    font-size:1.1rem;
    padding:16px 36px;
    border-radius:999px;
    border:4px solid var(--ink);
    text-decoration:none;
    box-shadow:6px 6px 0 var(--ink);
    transition:transform .15s ease, box-shadow .15s ease;
  }
  .hero-btn:hover{
    transform:translate(-3px,-3px);
    box-shadow:9px 9px 0 var(--ink);
  }

  .hero-figure{
    position:relative;
    margin:40px auto 0;
    width:200px;
  }

  /* ---------- SECTION SHELL ---------- */
  section{
    padding:70px 28px;
    max-width:1080px;
    margin:0 auto;
  }
  .section-title{
    text-align:center;
    font-size:clamp(1.8rem, 4vw, 2.6rem);
    margin-bottom:10px;
  }
  .section-sub{
    text-align:center;
    max-width:520px;
    margin:0 auto 48px;
    color:#5b5570;
    font-size:1.05rem;
  }

  /* ---------- POWER CARDS (Eat / Move / Sleep / Clean / Feelings) ---------- */
  .power-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
    gap:24px;
  }
  .power-card{
    background:white;
    border:4px solid var(--ink);
    border-radius:24px;
    padding:28px 22px;
    text-align:center;
    box-shadow:6px 6px 0 var(--ink);
    transition:transform .2s ease;
  }
  .power-card:hover{
    transform:translateY(-6px) rotate(-1deg);
  }
  .power-card .icon-wrap{
    width:84px;
    height:84px;
    margin:0 auto 16px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    border:3px solid var(--ink);
  }
  .power-card h3{
    font-size:1.25rem;
    margin-bottom:8px;
  }
  .power-card p{
    font-size:.95rem;
    color:#4a4560;
  }
  .bg-sun{ background:var(--sun); }
  .bg-leaf{ background:var(--leaf); }
  .bg-berry{ background:var(--berry); }
  .bg-sky{ background:var(--sky); }
  .bg-grape{ background:var(--grape); }

  /* ---------- PLATE SECTION ---------- */
  .plate-section{
    background:white;
    border-top:6px solid var(--ink);
    border-bottom:6px solid var(--ink);
  }
  .plate-wrap{
    display:flex;
    flex-wrap:wrap;
    align-items:center;
    gap:48px;
    justify-content:center;
  }
  .plate-text{
    flex:1;
    min-width:260px;
    max-width:420px;
  }
  .plate-text ul{
    list-style:none;
    margin-top:20px;
  }
  .plate-text li{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:14px;
    font-weight:700;
    font-size:1.05rem;
  }
  .dot{
    width:18px;
    height:18px;
    border-radius:50%;
    border:3px solid var(--ink);
    flex-shrink:0;
  }

  /* ---------- DAILY ROUTINE TIMELINE ---------- */
  .routine{
    background:linear-gradient(180deg, var(--cream), #FFF3DE);
  }
  .routine-track{
    position:relative;
    max-width:680px;
    margin:0 auto;
    padding-left:36px;
    border-left:5px dashed var(--ink);
  }
  .routine-item{
    position:relative;
    margin-bottom:36px;
    background:white;
    border:3px solid var(--ink);
    border-radius:18px;
    padding:16px 20px;
    box-shadow:5px 5px 0 var(--ink);
  }
  .routine-item::before{
    content:attr(data-time);
    position:absolute;
    left:-58px;
    top:18px;
    background:var(--ink);
    color:white;
    font-size:.7rem;
    font-weight:900;
    padding:4px 8px;
    border-radius:8px;
    white-space:nowrap;
  }
  .routine-item h3{ font-size:1.1rem; margin-bottom:4px; }
  .routine-item p{ font-size:.92rem; color:#4a4560; }

  /* ---------- FEELINGS SECTION ---------- */
  .feelings{
    background:var(--grape);
    border-top:6px solid var(--ink);
    border-bottom:6px solid var(--ink);
    color:white;
  }
  .feelings .section-title, .feelings .section-sub{ color:white; }
  .feelings .section-sub{ color:#ECE3FF; }
  .feeling-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(150px,1fr));
    gap:20px;
    max-width:760px;
    margin:0 auto;
  }
  .feeling-chip{
    background:white;
    color:var(--ink);
    border-radius:18px;
    border:3px solid var(--ink);
    padding:18px 12px;
    text-align:center;
    font-weight:800;
  }
  .feeling-chip .emoji{ font-size:2rem; display:block; margin-bottom:6px; }

  /* ---------- QUIZ / TIP BOX ---------- */
  .tip-box{
    background:var(--sun);
    border:4px solid var(--ink);
    border-radius:24px;
    padding:36px;
    max-width:680px;
    margin:0 auto;
    text-align:center;
    box-shadow:8px 8px 0 var(--ink);
  }
  .tip-box h2{ font-size:1.6rem; margin-bottom:14px; }
  .tip-box p{ font-size:1.05rem; font-weight:600; }

  /* ---------- FOOTER ---------- */
  footer{
    background:var(--ink);
    color:white;
    text-align:center;
    padding:36px 20px;
    font-size:.95rem;
  }
  footer .star{ font-size:1.3rem; }

  @media (max-width:600px){
    .routine-track{ padding-left:30px; }
    .routine-item::before{ left:-48px; font-size:.62rem; padding:3px 6px; }
  }

  /* reduced motion */
  @media (prefers-reduced-motion: reduce){
    .hero-cloud{ animation:none; }
    .power-card:hover{ transform:none; }
  }
</style>
</head>
<body>

<nav>
  <div class="logo"><span class="star">⭐</span> Healthy Heroes</div>
  <ul class="nav-links">
    <li><a href="#powers">5 Powers</a></li>
    <li><a href="#plate">Yummy Plate</a></li>
    <li><a href="#routine">My Day</a></li>
    <li><a href="#feelings">Feelings</a></li>
  </ul>
</nav>

<header class="hero">
  <svg class="hero-cloud" style="top:30px; left:5%;" viewBox="0 0 100 60" xmlns="http://www.w3.org/2000/svg">
    <ellipse cx="30" cy="35" rx="28" ry="20" fill="white"/>
    <ellipse cx="60" cy="28" rx="22" ry="18" fill="white"/>
  </svg>
  <svg class="hero-cloud" style="top:90px; left:60%; animation-delay:-10s;" viewBox="0 0 100 60" xmlns="http://www.w3.org/2000/svg">
    <ellipse cx="30" cy="35" rx="24" ry="16" fill="white"/>
    <ellipse cx="55" cy="30" rx="18" ry="14" fill="white"/>
  </svg>

  <h1>Every Body is a<br>Superhero Body!</h1>
  <p>Learn fun and easy ways to keep your body strong, your mind happy, and your smile big. Let's grow into Healthy Heroes together!</p>
  <a href="#powers" class="hero-btn">Discover My Powers →</a>

  <div class="hero-figure">
    <svg viewBox="0 0 200 220" width="200" height="220" xmlns="http://www.w3.org/2000/svg">
      <!-- cape -->
      <path d="M60 70 L20 180 Q100 160 180 180 L140 70 Z" fill="#FF6B6B" stroke="#2B2640" stroke-width="4"/>
      <!-- body -->
      <circle cx="100" cy="60" r="38" fill="#FFD9B3" stroke="#2B2640" stroke-width="4"/>
      <rect x="72" y="92" width="56" height="70" rx="20" fill="#5FC9F3" stroke="#2B2640" stroke-width="4"/>
      <!-- arms -->
      <rect x="40" y="100" width="34" height="16" rx="8" fill="#FFD9B3" stroke="#2B2640" stroke-width="4"/>
      <rect x="126" y="100" width="34" height="16" rx="8" fill="#FFD9B3" stroke="#2B2640" stroke-width="4"/>
      <!-- legs -->
      <rect x="78" y="158" width="16" height="40" rx="6" fill="#9B6BFF" stroke="#2B2640" stroke-width="4"/>
      <rect x="106" y="158" width="16" height="40" rx="6" fill="#9B6BFF" stroke="#2B2640" stroke-width="4"/>
      <!-- face -->
      <circle cx="86" cy="58" r="4" fill="#2B2640"/>
      <circle cx="114" cy="58" r="4" fill="#2B2640"/>
      <path d="M84 74 Q100 86 116 74" stroke="#2B2640" stroke-width="4" fill="none" stroke-linecap="round"/>
      <!-- star on chest -->
      <text x="100" y="135" font-size="24" text-anchor="middle">⭐</text>
    </svg>
  </div>
</header>

<section id="powers">
  <h2 class="section-title">Your 5 Superpowers</h2>
  <p class="section-sub">Real superheroes are made every day with these five simple habits. Which one will you power up today?</p>

  <div class="power-grid">
    <div class="power-card">
      <div class="icon-wrap bg-leaf">
        <svg width="44" height="44" viewBox="0 0 44 44"><circle cx="22" cy="22" r="14" fill="white"/><path d="M22 10c-2 4-6 6-6 12 0 4 3 7 6 7s6-3 6-7c0-6-4-8-6-12z" fill="#5BC97E"/></svg>
      </div>
      <h3>Eat the Rainbow</h3>
      <p>Fruits and veggies in lots of colors give your body strong muscles and bright energy.</p>
    </div>

    <div class="power-card">
      <div class="icon-wrap bg-sky">
        <svg width="44" height="44" viewBox="0 0 44 44"><circle cx="22" cy="22" r="16" fill="white"/><path d="M14 26l6-10 4 6 4-4 4 8" stroke="#5FC9F3" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </div>
      <h3>Move and Play</h3>
      <p>Running, dancing, and jumping for 60 minutes a day keeps your heart happy and strong.</p>
    </div>

    <div class="power-card">
      <div class="icon-wrap bg-grape">
        <svg width="44" height="44" viewBox="0 0 44 44"><circle cx="22" cy="22" r="16" fill="white"/><path d="M26 14a9 9 0 1 0 4 16 11 11 0 0 1-4-16z" fill="#9B6BFF"/></svg>
      </div>
      <h3>Sleep Like a Star</h3>
      <p>9 to 11 hours of cozy sleep helps your brain remember things and your body grow.</p>
    </div>

    <div class="power-card">
      <div class="icon-wrap bg-sun">
        <svg width="44" height="44" viewBox="0 0 44 44"><circle cx="22" cy="22" r="16" fill="white"/><path d="M22 12v6M22 26v6M12 22h6M26 22h6" stroke="#FFC93C" stroke-width="3" stroke-linecap="round"/><circle cx="22" cy="22" r="5" fill="#FFC93C"/></svg>
      </div>
      <h3>Wash and Sparkle</h3>
      <p>Washing hands, brushing teeth, and bathing keeps yucky germs away from your superhero body.</p>
    </div>

    <div class="power-card">
      <div class="icon-wrap bg-berry">
        <svg width="44" height="44" viewBox="0 0 44 44"><circle cx="22" cy="22" r="16" fill="white"/><path d="M22 30s-9-5.5-9-12a5.5 5.5 0 0 1 9-4 5.5 5.5 0 0 1 9 4c0 6.5-9 12-9 12z" fill="#FF6B6B"/></svg>
      </div>
      <h3>Share Your Feelings</h3>
      <p>Talking about how you feel with someone you trust keeps your heart and mind feeling light.</p>
    </div>

    <div class="power-card">
      <div class="icon-wrap bg-leaf">
        <svg width="44" height="44" viewBox="0 0 44 44"><circle cx="22" cy="22" r="16" fill="white"/><path d="M22 14v16M14 22h16" stroke="#5BC97E" stroke-width="4" stroke-linecap="round"/></svg>
      </div>
      <h3>Drink Plenty of Water</h3>
      <p>Water helps carry energy all around your body, like a river feeding a forest.</p>
    </div>
  </div>
</section>

<section id="plate" class="plate-section">
  <h2 class="section-title">Build a Yummy Plate</h2>
  <p class="section-sub">A balanced plate helps your superhero body get everything it needs in one happy meal.</p>

  <div class="plate-wrap">
    <svg width="280" height="280" viewBox="0 0 280 280" xmlns="http://www.w3.org/2000/svg">
      <circle cx="140" cy="140" r="130" fill="#FFFBF2" stroke="#2B2640" stroke-width="5"/>
      <!-- veggies half -->
      <path d="M140 140 L140 10 A130 130 0 0 1 247 90 Z" fill="#5BC97E" stroke="#2B2640" stroke-width="3"/>
      <!-- fruit quarter -->
      <path d="M140 140 L247 90 A130 130 0 0 1 247 190 Z" fill="#FF6B6B" stroke="#2B2640" stroke-width="3"/>
      <!-- grains -->
      <path d="M140 140 L247 190 A130 130 0 0 1 140 270 Z" fill="#FFC93C" stroke="#2B2640" stroke-width="3"/>
      <!-- protein -->
      <path d="M140 140 L140 270 A130 130 0 0 1 33 90 Z" fill="#9B6BFF" stroke="#2B2640" stroke-width="3"/>
      <!-- dairy circle -->
      <circle cx="33" cy="90" r="0" fill="none"/>
      <path d="M140 140 L33 90 A130 130 0 0 1 140 10 Z" fill="#5FC9F3" stroke="#2B2640" stroke-width="3"/>
      <circle cx="140" cy="140" r="22" fill="white" stroke="#2B2640" stroke-width="4"/>
      <text x="140" y="146" font-size="22" text-anchor="middle">🍽️</text>
    </svg>

    <div class="plate-text">
      <h3 style="font-size:1.4rem; margin-bottom:6px;">Fill it up with...</h3>
      <ul>
        <li><span class="dot" style="background:var(--leaf);"></span> Veggies — like broccoli, carrots, spinach</li>
        <li><span class="dot" style="background:var(--berry);"></span> Fruits — like apples, berries, mango</li>
        <li><span class="dot" style="background:var(--sun);"></span> Grains — like rice, oats, whole wheat roti</li>
        <li><span class="dot" style="background:var(--grape);"></span> Protein — like eggs, beans, paneer, fish</li>
        <li><span class="dot" style="background:var(--sky);"></span> Dairy — like milk, yogurt, cheese</li>
      </ul>
    </div>
  </div>
</section>

<section id="routine" class="routine">
  <h2 class="section-title">A Healthy Hero's Day</h2>
  <p class="section-sub">Here's an example of a balanced day. Yours might look a little different, and that's okay!</p>

  <div class="routine-track">
    <div class="routine-item" data-time="7 AM">
      <h3>🌞 Rise and Shine</h3>
      <p>Wake up, stretch big, and drink a glass of water.</p>
    </div>
    <div class="routine-item" data-time="7:30 AM">
      <h3>🥣 Power Breakfast</h3>
      <p>Eat something colorful like fruit, eggs, or oats.</p>
    </div>
    <div class="routine-item" data-time="3 PM">
      <h3>⚽ Play Time</h3>
      <p>Run, bike, dance, or play a sport for at least an hour.</p>
    </div>
    <div class="routine-item" data-time="7 PM">
      <h3>🪥 Sparkle Routine</h3>
      <p>Wash hands before dinner, then brush your teeth after.</p>
    </div>
    <div class="routine-item" data-time="8:30 PM">
      <h3>📖 Wind Down</h3>
      <p>Read a story or talk about your day with family.</p>
    </div>
    <div class="routine-item" data-time="9 PM">
      <h3>🌙 Sweet Dreams</h3>
      <p>Cozy up for 9-11 hours of restful, super-charging sleep.</p>
    </div>
  </div>
</section>

<section id="feelings" class="feelings">
  <h2 class="section-title">Feelings Are Healthy Too!</h2>
  <p class="section-sub">Being a Healthy Hero isn't just about your body — your feelings matter just as much. All feelings are okay to have.</p>

  <div class="feeling-grid">
    <div class="feeling-chip"><span class="emoji">😊</span>Happy</div>
    <div class="feeling-chip"><span class="emoji">😢</span>Sad</div>
    <div class="feeling-chip"><span class="emoji">😠</span>Angry</div>
    <div class="feeling-chip"><span class="emoji">😨</span>Worried</div>
    <div class="feeling-chip"><span class="emoji">🥱</span>Tired</div>
    <div class="feeling-chip"><span class="emoji">🤗</span>Excited</div>
  </div>
  <p style="text-align:center; margin-top:32px; font-weight:700;">
    Remember: it's always okay to talk to a parent, teacher, or grown-up you trust about how you feel.
  </p>
</section>

<section>
  <div class="tip-box">
    <h2>🌟 Hero Tip of the Day</h2>
    <p><?php echo htmlspecialchars($tipOfTheDay); ?></p>
  </div>
</section>

<footer>
  <p><span class="star">⭐</span> Healthy Heroes <span class="star">⭐</span></p>
  <p style="margin-top:8px; opacity:.8;">Made to help kids grow strong, happy, and healthy — one habit at a time.</p>
  <p style="margin-top:8px; opacity:.6; font-size:.8rem;">&copy; <?php echo $currentYear; ?> Healthy Heroes</p>
</footer>

</body>
</html>
