<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Campus Coin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --navy:#0F3D5C;
    --navy-deep:#0A2C42;
    --leaf:#2FA974;
    --leaf-deep:#1F7A54;
    --paper:#FAFDFB;
    --line:#DCE8E3;
    --ink:#12262A;
    --muted:#5C7772;
    --card:#FFFFFF;
    --danger:#C0553A;
    --radius:14px;
    padding-top: env(safe-area-inset-top, 0px);
    padding-bottom: env(safe-area-inset-bottom, 0px);
    box-sizing:border-box;
  }
  @media (prefers-color-scheme: dark){
    :root:not([data-theme="light"]){
      --paper:#0B1F27; --ink:#EAF3F0; --card:#102A33; --line:#1C3A42; --muted:#8FA9A3;
    }
  }
  :root[data-theme="dark"]{
    --paper:#0B1F27; --ink:#EAF3F0; --card:#102A33; --line:#1C3A42; --muted:#8FA9A3;
  }
  html{scroll-padding-top:env(safe-area-inset-top,0px);}
  *{box-sizing:border-box;}
  body{
    margin:0; background:var(--paper); color:var(--ink);
    font-family:'Inter',system-ui,-apple-system,sans-serif;
    min-height:100%;
  }
  h1,h2,h3,.brand{font-family:'Sora',system-ui,sans-serif;}
  .wrap{max-width:920px;margin:0 auto;padding:28px 20px 64px;}

  header.top{
    display:flex;align-items:center;justify-content:space-between;
    margin-bottom:26px;
  }
  .brand{display:flex;align-items:center;gap:10px;font-weight:800;font-size:1.25rem;color:var(--navy-deep);}
  :root[data-theme="dark"] .brand, @media (prefers-color-scheme: dark){.brand{color:#DDEEE8;}}
  .coin{
    width:34px;height:34px;border-radius:50%;
    background:linear-gradient(135deg,var(--leaf),var(--navy));
    display:flex;align-items:center;justify-content:center;color:white;font-weight:800;font-size:.95rem;
    flex-shrink:0;
  }
  .theme-toggle{
    border:1px solid var(--line); background:var(--card); color:var(--muted);
    border-radius:20px; padding:6px 14px; font-size:.82rem; cursor:pointer;
  }

  .hero{
    background:linear-gradient(135deg,var(--navy) 0%, var(--navy-deep) 100%);
    border-radius:20px; padding:26px 24px; color:#EAF6F0; margin-bottom:20px;
    position:relative; overflow:hidden;
  }
  .hero::after{
    content:""; position:absolute; right:-40px; top:-40px; width:180px; height:180px;
    background:radial-gradient(circle, rgba(47,169,116,.35), transparent 70%);
  }
  .hero .label{font-size:.82rem; color:#B9D8CC; margin:0 0 6px;}
  .hero .balance{font-size:2.6rem; font-weight:800; margin:0; letter-spacing:-.02em;}
  .hero .sub{font-size:.9rem; color:#B9D8CC; margin-top:6px;}
  .hero-grid{display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-top:20px;}
  .hero-stat{background:rgba(255,255,255,.08); border-radius:12px; padding:12px 14px;}
  .hero-stat .k{font-size:.76rem; color:#B9D8CC;}
  .hero-stat .v{font-size:1.25rem; font-weight:700; margin-top:2px;}
  .hero-stat.in .v{color:#7EE6B5;}
  .hero-stat.out .v{color:#F2B8A6;}

  .card{
    background:var(--card); border:1px solid var(--line); border-radius:var(--radius);
    padding:20px; margin-bottom:18px;
  }
  .card h2{font-size:1.05rem; margin:0 0 14px; font-weight:700;}

  form.entry{display:grid; grid-template-columns:1fr 1fr; gap:12px;}
  form.entry .full{grid-column:1/-1;}
  label{display:block; font-size:.78rem; color:var(--muted); margin-bottom:5px;}
  input, select{
    width:100%; padding:10px 12px; border-radius:9px; border:1px solid var(--line);
    background:var(--paper); color:var(--ink); font-size:.92rem; font-family:inherit;
  }
  input:focus, select:focus{outline:2px solid var(--leaf); outline-offset:1px;}
  .type-toggle{display:flex; gap:8px;}
  .type-btn{
    flex:1; padding:10px; border-radius:9px; border:1px solid var(--line);
    background:var(--paper); color:var(--muted); cursor:pointer; font-weight:600; font-size:.85rem;
  }
  .type-btn[aria-pressed="true"].earn{background:var(--leaf); border-color:var(--leaf); color:white;}
  .type-btn[aria-pressed="true"].spend{background:var(--danger); border-color:var(--danger); color:white;}
  .add-btn{
    grid-column:1/-1; margin-top:4px; padding:12px; border:none; border-radius:9px;
    background:var(--navy); color:white; font-weight:700; font-size:.92rem; cursor:pointer;
  }
  .add-btn:hover{background:var(--navy-deep);}

  .save-row{display:flex; gap:12px; align-items:flex-end; flex-wrap:wrap;}
  .save-row > div{flex:1; min-width:140px;}
  .progress{height:10px; border-radius:6px; background:var(--line); overflow:hidden; margin-top:12px;}
  .progress > i{display:block; height:100%; background:linear-gradient(90deg,var(--leaf-deep),var(--leaf));}
  .progress-note{font-size:.8rem; color:var(--muted); margin-top:8px;}

  ul.tx{list-style:none; margin:0; padding:0;}
  ul.tx li{
    display:flex; justify-content:space-between; align-items:center;
    padding:11px 0; border-bottom:1px solid var(--line); gap:10px;
  }
  ul.tx li:last-child{border-bottom:none;}
  .tx-left{display:flex; align-items:center; gap:10px; min-width:0;}
  .tx-dot{width:9px;height:9px;border-radius:50%;flex-shrink:0;}
  .tx-dot.earn{background:var(--leaf);}
  .tx-dot.spend{background:var(--danger);}
  .tx-name{font-weight:600; font-size:.9rem;}
  .tx-cat{font-size:.76rem; color:var(--muted);}
  .tx-amt{font-weight:700; font-size:.92rem; white-space:nowrap;}
  .tx-amt.earn{color:var(--leaf-deep);}
  .tx-amt.spend{color:var(--danger);}
  .tx-del{background:none;border:none;color:var(--muted);cursor:pointer;font-size:.78rem;padding:4px;}
  .empty{color:var(--muted); font-size:.88rem; text-align:center; padding:18px 0;}

  .tips{display:grid; gap:10px;}
  .tip{
    display:flex; gap:12px; padding:13px; border-radius:11px; background:var(--paper);
    border:1px solid var(--line);
  }
  .tip .ico{
    width:30px;height:30px;border-radius:8px;background:rgba(47,169,116,.15);
    display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.95rem;
  }
  .tip .txt{font-size:.86rem; line-height:1.45;}
  .tip .txt b{display:block; margin-bottom:2px; font-size:.9rem;}

  footer{text-align:center; color:var(--muted); font-size:.78rem; margin-top:10px;}

  @media (max-width:520px){
    .hero .balance{font-size:2.1rem;}
    form.entry{grid-template-columns:1fr;}
  }
</style>
</head>
<body>
<div class="wrap">

  <header class="top">
    <div class="brand"><span class="coin">CC</span> Campus Coin</div>
    <button class="theme-toggle" id="themeBtn" type="button">Dark / Light</button>
  </header>

  <section class="hero">
    <p class="label">Total Balance</p>
    <p class="balance" id="balanceOut">Rs 0</p>
    <p class="sub" id="balanceNote">Track your earnings, savings, and spending here</p>
    <div class="hero-grid">
      <div class="hero-stat in">
        <div class="k">Total Earning</div>
        <div class="v" id="totalEarnOut">Rs 0</div>
      </div>
      <div class="hero-stat out">
        <div class="k">Total Spent</div>
        <div class="v" id="totalSpendOut">Rs 0</div>
      </div>
    </div>
  </section>

  <section class="card">
    <h2>Add New Entry</h2>
    <form class="entry" id="entryForm">
      <div class="full type-toggle">
        <button type="button" class="type-btn earn" id="btnEarn" aria-pressed="true">Earning</button>
        <button type="button" class="type-btn spend" id="btnSpend" aria-pressed="false">Expense</button>
      </div>
      <div class="full">
        <label for="txName">Description (what it is for)</label>
        <input type="text" id="txName" placeholder="Example: Tuition income, food, books" required>
      </div>
      <div>
        <label for="txAmt">Amount (Rs)</label>
        <input type="number" id="txAmt" min="1" step="1" placeholder="0" required>
      </div>
      <div>
        <label for="txCat">Category</label>
        <select id="txCat">
          <option>Food</option>
          <option>Transport</option>
          <option>Tuition / Job</option>
          <option>Padhai ka Expense</option>
          <option>Mobile / Internet</option>
          <option>Sent Home</option>
          <option>Other</option>
        </select>
      </div>
      <button type="submit" class="add-btn">Add Entry</button>
    </form>
  </section>

  <section class="card">
    <h2>Saving Goal</h2>
    <div class="save-row">
      <div>
        <label for="goalAmt">Goal Amount (Rs)</label>
        <input type="number" id="goalAmt" min="0" step="100" placeholder="Example: 20000">
      </div>
    </div>
    <div class="progress"><i id="goalBar" style="width:0%"></i></div>
    <p class="progress-note" id="goalNote">Set a goal and track your savings progress.</p>
  </section>

  <section class="card">
    <h2>All Entries</h2>
    <ul class="tx" id="txList"></ul>
    <p class="empty" id="emptyNote">No entries yet. Add one above.</p>
  </section>

  <section class="card">
    <h2>Where You Can Save</h2>
    <div class="tips">
      <div class="tip"><div class="ico">🏦</div><div class="txt"><b>Bank Saving Account</b>Keep your money in a student or regular savings account at a bank — you may earn monthly profit and your money stays secure.</div></div>
      <div class="tip"><div class="ico">📱</div><div class="txt"><b>Mobile Wallet (Easypaisa / JazzCash)</b>Easy for small amounts, you can withdraw money quickly, and some accounts also offer profit.</div></div>
      <div class="tip"><div class="ico">🎯</div><div class="txt"><b>Committee ya Group Saving</b>Joining a monthly savings committee with friends or classmates can be a disciplined way to save a larger amount.</div></div>
      <div class="tip"><div class="ico">💰</div><div class="txt"><b>50/30/20 Rule Follow Karein</b>Put around 20% of your earnings directly into savings and use the rest for needs and expenses.</div></div>
      <div class="tip"><div class="ico">🚫</div><div class="txt"><b>Track Small Expenses</b>Tea, snacks, and unnecessary online orders — these small expenses can make a big difference by the end of the month.</div></div>
    </div>
  </section>

  <footer>Your data is stored only in this browser (it is not sent to any server).</footer>
</div>

<script>
(function(){
  var STORE_KEY = 'campuscoin_data_v1';
  var currentType = 'earn';
  var data = { tx: [], goal: 0 };

  function loadData(){
    try{
      var raw = localStorage.getItem(STORE_KEY);
      if(raw){ data = JSON.parse(raw); if(!Array.isArray(data.tx)) data.tx=[]; if(!data.goal) data.goal=0; }
    }catch(e){ console.warn('Could not load saved data', e); data = { tx: [], goal: 0 }; }
  }
  function saveData(){
    try{ localStorage.setItem(STORE_KEY, JSON.stringify(data)); }
    catch(e){ console.warn('Could not save data', e); }
  }
  function fmt(n){
    return 'Rs ' + Number(n||0).toLocaleString('en-PK');
  }

  var btnEarn = document.getElementById('btnEarn');
  var btnSpend = document.getElementById('btnSpend');
  btnEarn.addEventListener('click', function(){
    currentType='earn'; btnEarn.setAttribute('aria-pressed','true'); btnSpend.setAttribute('aria-pressed','false');
  });
  btnSpend.addEventListener('click', function(){
    currentType='spend'; btnSpend.setAttribute('aria-pressed','true'); btnEarn.setAttribute('aria-pressed','false');
  });

  document.getElementById('entryForm').addEventListener('submit', function(e){
    e.preventDefault();
    var name = document.getElementById('txName').value.trim();
    var amt = parseFloat(document.getElementById('txAmt').value);
    var cat = document.getElementById('txCat').value;
    if(!name || !amt || amt<=0) return;
    data.tx.unshift({ id: Date.now(), name: name, amt: amt, cat: cat, type: currentType, date: new Date().toLocaleDateString('en-GB') });
    saveData();
    document.getElementById('txName').value='';
    document.getElementById('txAmt').value='';
    render();
  });

  var goalInput = document.getElementById('goalAmt');
  goalInput.addEventListener('change', function(){
    data.goal = parseFloat(goalInput.value)||0;
    saveData();
    render();
  });

  function deleteTx(id){
    data.tx = data.tx.filter(function(t){ return t.id!==id; });
    saveData();
    render();
  }

  function render(){
    var earn=0, spend=0;
    data.tx.forEach(function(t){ if(t.type==='earn') earn+=t.amt; else spend+=t.amt; });
    var balance = earn - spend;
    document.getElementById('balanceOut').textContent = fmt(balance);
    document.getElementById('totalEarnOut').textContent = fmt(earn);
    document.getElementById('totalSpendOut').textContent = fmt(spend);
    document.getElementById('balanceNote').textContent = balance>=0
      ? 'Your current savings position is on track — keep tracking it this way.'
      : 'Expense earning se zyada ho gaya hai — kharche kam karne ki koshish karein.';

    goalInput.value = data.goal || '';
    var pct = data.goal>0 ? Math.min(100, Math.max(0,(balance/data.goal)*100)) : 0;
    document.getElementById('goalBar').style.width = pct+'%';
    document.getElementById('goalNote').textContent = data.goal>0
      ? fmt(Math.max(balance,0)) + ' saved toward the goal of ' + fmt(data.goal) + ' (' + pct.toFixed(0) + '%).'
      : 'Set a goal and track your savings progress.';

    var list = document.getElementById('txList');
    var empty = document.getElementById('emptyNote');
    list.innerHTML='';
    if(data.tx.length===0){ empty.style.display='block'; }
    else{
      empty.style.display='none';
      data.tx.forEach(function(t){
        var li = document.createElement('li');
        li.innerHTML =
          '<div class="tx-left">'+
            '<span class="tx-dot '+t.type+'"></span>'+
            '<div><div class="tx-name"></div><div class="tx-cat"></div></div>'+
          '</div>'+
          '<div style="display:flex;align-items:center;gap:10px;">'+
            '<span class="tx-amt '+t.type+'"></span>'+
            '<button class="tx-del" type="button" aria-label="Delete">✕</button>'+
          '</div>';
        li.querySelector('.tx-name').textContent = t.name;
        li.querySelector('.tx-cat').textContent = t.cat + ' · ' + t.date;
        li.querySelector('.tx-amt').textContent = (t.type==='earn'?'+ ':'- ') + fmt(t.amt);
        li.querySelector('.tx-del').addEventListener('click', function(){ deleteTx(t.id); });
        list.appendChild(li);
      });
    }
  }

  document.getElementById('themeBtn').addEventListener('click', function(){
    var root = document.documentElement;
    var cur = root.getAttribute('data-theme');
    if(cur==='dark'){ root.setAttribute('data-theme','light'); }
    else if(cur==='light'){ root.removeAttribute('data-theme'); }
    else { root.setAttribute('data-theme','dark'); }
  });

  loadData();
  render();
})();
</script>
</body>
</html>
