
<?php session_start(); ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Sora:wght@300;400;500;600&display=swap');
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#0d0f14;--surface:#151820;--surface2:#1c202c;--surface3:#232838;
  --border:rgba(255,255,255,0.07);--border2:rgba(255,255,255,0.13);
  --accent:#4f8ef7;--accent2:#7b5cf0;--success:#34d399;--danger:#f87171;
  --warn:#fbbf24;--text:#e8eaf0;--muted:#7a7f96;
  --mono:'DM Mono',monospace;--sans:'Sora',sans-serif;
}
body{font-family:var(--sans);background:var(--bg);color:var(--text);margin:0;display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:100vh;padding:1rem}
.app{width:100%;max-width:640px;display:flex;flex-direction:column;justify-content:center}
.logo{display:flex;align-items:center;gap:10px;margin-bottom:1.5rem;justify-content:center}
.logo-icon{width:36px;height:36px;background:linear-gradient(135deg,var(--accent),var(--accent2));border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px}
.logo-text{font-size:20px;font-weight:600;letter-spacing:-0.5px}
.card{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:2rem;position:relative;overflow:hidden;margin-bottom:1.25rem;box-shadow:0 10px 30px rgba(0,0,0,0.2)}
.card::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--accent),transparent);opacity:0.5}
.tab-row{display:flex;gap:4px;background:var(--surface2);border-radius:10px;padding:4px;margin-bottom:1.75rem}
.tab{flex:1;padding:8px;text-align:center;font-size:13px;font-weight:500;font-family:var(--sans);color:var(--muted);background:transparent;border:none;border-radius:7px;cursor:pointer;transition:all 0.2s}
.tab.active{background:var(--surface);color:var(--text)}
.field{margin-bottom:1.1rem}
label{display:block;font-size:12px;font-weight:500;color:var(--muted);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:6px}
.input-wrap{position:relative}
input[type="text"],input[type="email"],input[type="password"]{width:100%;background:var(--surface2);border:1px solid var(--border2);border-radius:9px;padding:11px 40px 11px 14px;font-family:var(--sans);font-size:14px;color:var(--text);outline:none;transition:border-color 0.2s,box-shadow 0.2s}
input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(79,142,247,0.12)}
input.error{border-color:var(--danger)}
input.ok{border-color:var(--success)}
input::-ms-reveal, input::-ms-clear { display: none; }
.field-icon{position:absolute;right:12px;top:50%;transform:translateY(-50%);cursor:pointer;user-select:none;display:flex;align-items:center;justify-content:center;color:var(--muted);transition:color 0.2s}
.field-icon:hover{color:var(--text)}
.field-icon svg{width:18px;height:18px;display:block}
.strength-bar{height:3px;border-radius:2px;background:var(--surface2);margin-top:6px;overflow:hidden}
.strength-fill{height:100%;border-radius:2px;transition:width 0.3s,background 0.3s}
.hint{font-size:11px;color:var(--muted);margin-top:4px}
.btn{width:100%;padding:12px;background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;font-family:var(--sans);font-size:14px;font-weight:600;border:none;border-radius:9px;cursor:pointer;margin-top:0.5rem;transition:opacity 0.2s,transform 0.1s;letter-spacing:0.01em}
.btn:hover{opacity:0.9}
.btn:active{transform:scale(0.98)}
.alert{padding:10px 14px;border-radius:9px;font-size:13px;margin-bottom:1rem;display:flex;align-items:center;gap:8px}
.alert.err{background:rgba(248,113,113,0.1);border:1px solid rgba(248,113,113,0.2);color:var(--danger)}
.alert.suc{background:rgba(52,211,153,0.1);border:1px solid rgba(52,211,153,0.2);color:var(--success)}
.alert.inf{background:rgba(79,142,247,0.1);border:1px solid rgba(79,142,247,0.2);color:var(--accent)}
.security-tags{display:flex;flex-wrap:wrap;gap:6px;margin-top:1.25rem}
.tag{padding:4px 10px;background:var(--surface2);border:1px solid var(--border);border-radius:20px;font-size:11px;color:var(--muted);display:flex;align-items:center;gap:4px}
.tag span{color:var(--success)}
.dash-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:0}
.avatar{width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:600;color:white}
.logout-btn{background:transparent;border:1px solid var(--border2);color:var(--muted);font-family:var(--sans);font-size:12px;padding:6px 14px;border-radius:7px;cursor:pointer;transition:all 0.2s}
.logout-btn:hover{border-color:var(--danger);color:var(--danger)}
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:1.25rem}
.info-cell{background:var(--surface2);border-radius:10px;padding:12px 14px}
.ic-label{font-size:11px;color:var(--muted);text-transform:uppercase;letter-spacing:0.05em;margin-bottom:4px}
.ic-value{font-size:13px;font-weight:500;color:var(--text);word-break:break-all}
.fade-in{animation:fadeIn 0.3s ease}
@keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}

/* WebGoat lesson styles */
.lesson-card{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:0;overflow:hidden;position:relative;box-shadow:0 10px 40px rgba(0,0,0,0.3)}
.lesson-card::before{content:'';position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent,var(--warn),transparent);opacity:0.6;z-index:1}
.lesson-header{padding:1.25rem 1.5rem;border-bottom:1px solid var(--border)}
.lesson-badge{display:inline-flex;align-items:center;gap:6px;background:rgba(251,191,36,0.12);border:1px solid rgba(251,191,36,0.25);color:var(--warn);font-size:11px;font-weight:500;padding:4px 10px;border-radius:20px;margin-bottom:10px}
.lesson-title{font-size:16px;font-weight:600;color:var(--text);margin-bottom:4px}
.lesson-sub{font-size:12px;color:var(--muted)}
.lesson-body{padding:1.25rem 1.5rem}
.section-label{font-size:11px;font-weight:500;color:var(--muted);text-transform:uppercase;letter-spacing:0.06em;margin-bottom:8px}
.theory-box{background:var(--surface2);border-radius:10px;padding:14px;margin-bottom:1rem;font-size:13px;color:var(--text);line-height:1.7}
.theory-box code{font-family:var(--mono);background:rgba(255,255,255,0.06);padding:2px 6px;border-radius:4px;font-size:12px;color:var(--accent)}
.vuln-sql{font-family:var(--mono);font-size:12px;background:rgba(248,113,113,0.07);border:1px solid rgba(248,113,113,0.2);border-radius:8px;padding:12px;margin-bottom:1rem;line-height:1.7;color:#f0a0a0}
.vuln-sql .kw{color:var(--danger)}
.vuln-sql .str{color:var(--warn)}
.vuln-sql .cmt{color:var(--muted)}
.lab-area{background:var(--surface2);border-radius:10px;padding:14px;margin-bottom:1rem}
.lab-row{display:flex;gap:8px;margin-bottom:10px;flex-wrap:wrap}
.lab-input{flex:1;min-width:160px;background:var(--surface3);border:1px solid var(--border2);border-radius:8px;padding:9px 12px;font-family:var(--mono);font-size:13px;color:var(--text);outline:none;transition:border-color 0.2s}
.lab-input:focus{border-color:var(--accent)}
.lab-btn{padding:9px 18px;background:var(--surface3);border:1px solid var(--border2);border-radius:8px;color:var(--text);font-family:var(--sans);font-size:13px;font-weight:500;cursor:pointer;transition:all 0.2s;white-space:nowrap}
.lab-btn:hover{border-color:var(--accent);color:var(--accent)}
.lab-btn.atk{border-color:rgba(248,113,113,0.35);color:var(--danger)}
.lab-btn.atk:hover{background:rgba(248,113,113,0.08)}
.query-preview{font-family:var(--mono);font-size:12px;padding:10px 12px;background:rgba(0,0,0,0.25);border-radius:8px;margin-bottom:10px;line-height:1.6;color:#b0b8d0;min-height:40px;word-break:break-all}
.result-table{width:100%;border-collapse:collapse;font-size:12px;margin-top:4px}
.result-table th{font-family:var(--mono);font-weight:500;color:var(--muted);text-align:left;padding:6px 10px;border-bottom:1px solid var(--border2);font-size:11px;text-transform:uppercase;letter-spacing:0.05em}
.result-table td{font-family:var(--mono);padding:6px 10px;color:var(--text);border-bottom:1px solid var(--border)}
.result-table tr.highlight td{color:var(--danger);background:rgba(248,113,113,0.05)}
.result-table tr:last-child td{border-bottom:none}
.explanation{background:rgba(52,211,153,0.07);border:1px solid rgba(52,211,153,0.2);border-radius:10px;padding:12px 14px;font-size:13px;color:var(--text);line-height:1.6;margin-top:10px;display:none}
.explanation.show{display:block}
.explanation strong{color:var(--success)}
.fix-box{background:rgba(79,142,247,0.07);border:1px solid rgba(79,142,247,0.2);border-radius:10px;padding:12px 14px;font-size:13px;color:var(--text);line-height:1.6;margin-top:10px}
.fix-box code{font-family:var(--mono);font-size:12px;background:rgba(79,142,247,0.12);color:var(--accent);padding:2px 6px;border-radius:4px}
.step-row{display:flex;gap:6px;margin-bottom:12px}
.step{font-size:11px;padding:4px 10px;border-radius:20px;cursor:pointer;border:1px solid var(--border2);color:var(--muted);background:transparent;font-family:var(--sans);transition:all 0.2s}
.step.done{border-color:var(--success);color:var(--success);background:rgba(52,211,153,0.08)}
.step.active{border-color:var(--accent);color:var(--accent);background:rgba(79,142,247,0.1)}
.progress-bar{height:3px;background:var(--border);border-radius:2px;margin-bottom:1.25rem;overflow:hidden}
.progress-fill{height:100%;background:var(--success);border-radius:2px;transition:width 0.4s}
</style>

<div class="app">
  <div class="logo">
    <div class="logo-text">AuthFlow</div>
  </div>

  <!-- WELCOME CTA -->
  <div style="text-align:center;margin-bottom:2rem;animation:fadeIn 0.5s ease">
    <h1 style="font-size:24px;font-weight:600;margin-bottom:8px;background:linear-gradient(135deg,var(--text),var(--muted));-webkit-background-clip:text;-webkit-text-fill-color:transparent">Sign up here for hacking lessons!</h1>
    <p style="font-size:14px;color:var(--muted);max-width:400px;margin:0 auto">Learn OWASP top security risks through interactive, hands-on labs.</p>
  </div>

  <!-- AUTH CARD -->
  <div class="card" id="authCard">
    <div class="tab-row">
      <button class="tab active" onclick="switchTab('login')">Sign in</button>
      <button class="tab" onclick="switchTab('register')">Create account</button>
    </div>
    <div id="alertBox" style="display:none"></div>

    <!-- LOGIN -->
    <div id="loginForm">
      <div class="field">
        <label>Email address</label>
        <div class="input-wrap">
          <input type="email" id="loginEmail" placeholder="you@example.com" oninput="clearAlert()"/>
        </div>
      </div>
      <div class="field">
        <label>Password</label>
        <div class="input-wrap">
          <input type="password" id="loginPass" placeholder="Enter your password" oninput="clearAlert()"/>
          <span class="field-icon" onclick="toggleVis('loginPass',this)">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
          </span>
        </div>
      </div>
      <button class="btn" onclick="doLogin()">Sign in →</button>
      </div>
    </div>

    <!-- REGISTER -->
    <div id="registerForm" style="display:none">
      <div class="field">
        <label>Full name</label>
        <div class="input-wrap"><input type="text" id="regName" placeholder="Joe Biden" oninput="clearAlert()"/></div>
      </div>
      <div class="field">
        <label>Email address</label>
        <div class="input-wrap">
          <input type="email" id="regEmail" placeholder="you@example.com" oninput="validateEmail()"/>
          <span class="field-icon" id="emailIcon"></span>
        </div>
      </div>
      <div class="field">
        <label>Password</label>
        <div class="input-wrap">
          <input type="password" id="regPass" placeholder="Choose a strong password" oninput="checkStrength()"/>
          <span class="field-icon" onclick="toggleVis('regPass',this)">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
          </span>
        </div>
        <div class="strength-bar"><div class="strength-fill" id="strengthFill" style="width:0%"></div></div>
        <div id="strengthLabel" style="font-size:11px;margin-top:4px"></div>
        <div class="hint">Min 8 chars · uppercase · number · symbol</div>
      </div>
      <div class="field">
        <label>Confirm password</label>
        <div class="input-wrap">
          <input type="password" id="regPass2" placeholder="Repeat password" oninput="checkMatch()"/>
          <span class="field-icon" id="matchIcon"></span>
        </div>
      </div>
      <button class="btn" onclick="doRegister()">Create account →</button>
    </div>
  </div>

  <!-- DASHBOARD + LESSON (hidden until login) -->
  <div id="dashSection" style="display:none">

    <!-- User header -->
    <div class="card fade-in" style="padding:1.25rem 1.5rem">
      <div class="dash-header" style="margin-bottom:0">
        <div style="display:flex;align-items:center;gap:12px">
          <div class="avatar" id="avatarEl"></div>
          <div>
            <div style="font-weight:600;font-size:15px" id="dashName"></div>
            <div style="font-size:12px;color:var(--success)">● Authenticated</div>
          </div>
        </div>
        <div style="display:flex;gap:8px">
          <a href="https://github.com/WebGoat/WebGoat" target="_blank" class="logout-btn" style="text-decoration:none;display:flex;align-items:center;gap:6px">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:14px;height:14px"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
            WebGoat
          </a>
          <button class="logout-btn" onclick="doLogout()">Sign out</button>
        </div>
      </div>
    </div>

    <!-- WebGoat Lesson -->
    <div class="lesson-card fade-in">
      <div class="lesson-header">
        <div class="lesson-badge">

          <span style="font-size:14px"></span> WebGoat · OWASP A03
        </div>
        <div class="lesson-title">SQL Injection — Authentication Bypass</div>
        <div class="lesson-sub">Learn how attackers exploit unsanitized login queries, then discover the fix</div>
      </div>

      <div class="lesson-body">
        <div class="progress-bar"><div class="progress-fill" id="progressFill" style="width:0%"></div></div>
        <div class="step-row">
          <div class="step active" id="step1Btn" onclick="gotoStep(1)">1 · Theory</div>
          <div class="step" id="step2Btn" onclick="gotoStep(2)">2 · Lab</div>
          <div class="step" id="step3Btn" onclick="gotoStep(3)">3 · Fix</div>
        </div>

        <!-- STEP 1: Theory -->
        <div id="step1">
          <div class="section-label">What is SQL injection?</div>
          <div class="theory-box">
            SQL injection happens when user-supplied input is <strong>concatenated directly</strong> into a SQL query without sanitization. An attacker can craft input that <em>changes the logic</em> of the query — bypassing authentication, dumping data, or even dropping tables.<br><br>
            A classic vulnerable login query looks like this:
          </div>
          <div class="vuln-sql">
            <span class="kw">SELECT</span> * <span class="kw">FROM</span> users<br>
            <span class="kw">WHERE</span> email = <span class="str">'</span> + userInput + <span class="str">'</span><br>
            <span class="kw">AND</span> password = <span class="str">'</span> + passInput + <span class="str">'</span>;
          </div>
          <div class="theory-box">
            If the attacker enters <code>' OR '1'='1</code> as the email, the query becomes always-true and returns all users — granting access without a valid password.
          </div>
          <button class="btn" style="margin-top:0.5rem" onclick="gotoStep(2)">Try the lab →</button>
        </div>

        <!-- STEP 2: Lab -->
        <div id="step2" style="display:none">
          <div class="section-label">Live injection lab (simulated)</div>
          <div class="lab-area">
            <div style="font-size:12px;color:var(--muted);margin-bottom:10px">Enter credentials below. Try the attack payloads to see how the vulnerable query behaves.</div>
            <div class="lab-row">
              <input class="lab-input" id="labEmail" placeholder="Email / username" oninput="updateQuery()"/>
              <input class="lab-input" id="labPass" placeholder="Password" oninput="updateQuery()"/>
            </div>
            <div class="lab-row">
              <button class="lab-btn" onclick="fillNormal()">Normal login</button>
              <button class="lab-btn atk" onclick="fillAttack1()">Inject #1 — always true</button>
              <button class="lab-btn atk" onclick="fillAttack2()">Inject #2 — comment trick</button>
              <button class="lab-btn" style="margin-left:auto" onclick="runQuery()">Run query ▶</button>
            </div>
            <div class="section-label" style="margin-bottom:4px">Generated SQL query</div>
            <div class="query-preview" id="queryPreview">SELECT * FROM users WHERE email = '' AND password = '';</div>
            <div id="resultArea" style="display:none">
              <div class="section-label" style="margin-top:10px;margin-bottom:4px">Query result</div>
              <table class="result-table" id="resultTable"></table>
              <div class="explanation" id="explainBox"></div>
            </div>
          </div>
          <button class="btn" onclick="gotoStep(3)">See the fix →</button>
        </div>

        <!-- STEP 3: Fix -->
        <div id="step3" style="display:none">
          <div class="section-label">The secure solution</div>
          <div class="theory-box">
            The fix is <strong>parameterized queries</strong> (also called prepared statements). Instead of building the SQL string with user input, you pass parameters separately — the database engine never interprets them as SQL code.
          </div>
          <div class="fix-box">
            <div style="font-size:12px;color:var(--accent);margin-bottom:8px;font-weight:500">✓ Secure — parameterized query</div>
            <code style="display:block;white-space:pre-wrap;font-size:12px;line-height:1.7;background:transparent;padding:0;color:var(--text)">const stmt = db.prepare(
  "SELECT * FROM users WHERE email = ? AND password = ?"
);
const rows = stmt.all(email, hashedPassword);</code>
          </div>
          <div class="theory-box" style="margin-top:1rem">
            Additional defenses layered in <strong>this app</strong>:
            <ul style="margin-top:8px;padding-left:18px;line-height:2">
              <li>PBKDF2 password hashing — raw passwords never stored</li>
              <li>Rate limiting — blocks brute-force and injection probing</li>
              <li>Input validation — rejects malformed email formats early</li>
              <li>Least-privilege DB user — no DROP/ALTER permissions</li>
            </ul>
          </div>
          <div style="display:flex;gap:8px;margin-top:1rem;flex-wrap:wrap">
            <button class="btn" style="background:linear-gradient(135deg,var(--success),#059669)" onclick="completeLesson()">Mark complete ✓</button>
            <button class="btn" style="background:var(--surface2);border:1px solid var(--border2);color:var(--text)" onclick="gotoStep(1)">Restart lesson</button>
          </div>
          <div id="completeBanner" style="display:none;margin-top:1rem;padding:12px 14px;background:rgba(52,211,153,0.1);border:1px solid rgba(52,211,153,0.25);border-radius:10px;font-size:13px;color:var(--success);text-align:center">
            🎉 Lesson complete! You understand SQL injection and how to prevent it.
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
// Check session on load
window.addEventListener('load', async () => {
  const user = <?php
    echo isset($_SESSION['user_name']) ? json_encode(['name' => $_SESSION['user_name'], 'email' => $_SESSION['user_email']]) : 'null';
  ?>;  if (user) showDashboard(user);
});

let currentStep=1;

function passwordStrength(p){
  let s=0;
  if(p.length>=8)s++;if(p.length>=12)s++;
  if(/[A-Z]/.test(p))s++;if(/[0-9]/.test(p))s++;if(/[^A-Za-z0-9]/.test(p))s++;
  return s;
}

function switchTab(tab){
  clearAlert();
  document.querySelectorAll('.tab').forEach((t,i)=>t.classList.toggle('active',(i===0&&tab==='login')||(i===1&&tab==='register')));
  document.getElementById('loginForm').style.display=tab==='login'?'':'none';
  document.getElementById('registerForm').style.display=tab==='register'?'':'none';
}

function toggleVis(id,icon){
  const el=document.getElementById(id);
  const isPass = el.type==='password';
  el.type=isPass?'text':'password';
  icon.innerHTML = isPass 
    ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>'
    : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
}
function showAlert(msg,type='err'){
  const b=document.getElementById('alertBox');
  const icons={
    err:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>',
    suc:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><polyline points="20 6 9 17 4 12"></polyline></svg>',
    inf:'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>'
  };
  b.innerHTML=`<div class="alert ${type}">${icons[type]} ${msg}</div>`;
  b.style.display='';
}
function clearAlert(){document.getElementById('alertBox').style.display='none'}

function validateEmail(){
  const el=document.getElementById('regEmail');const ic=document.getElementById('emailIcon');
  const ok=/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(el.value);
  el.className=el.value?(ok?'ok':'error'):'';
  ic.innerHTML=el.value?(ok?'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>':'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>'):'';
  ic.style.color=ok?'var(--success)':'var(--danger)';
}

function checkStrength(){
  const p=document.getElementById('regPass').value;const s=passwordStrength(p);
  const cs=[{pct:0,col:'transparent',txt:''},{pct:20,col:'#f87171',txt:'Very weak'},{pct:40,col:'#fbbf24',txt:'Weak'},{pct:60,col:'#fbbf24',txt:'Fair'},{pct:80,col:'#34d399',txt:'Strong'},{pct:100,col:'#34d399',txt:'Very strong'}];
  const c=cs[s]||cs[0];
  document.getElementById('strengthFill').style.cssText=`width:${c.pct}%;background:${c.col}`;
  const lbl=document.getElementById('strengthLabel');lbl.textContent=c.txt;lbl.style.color=c.col;
  checkMatch();
}

function checkMatch(){
  const p1=document.getElementById('regPass').value;const p2=document.getElementById('regPass2').value;
  const ic=document.getElementById('matchIcon');const el2=document.getElementById('regPass2');
  if(!p2){ic.innerHTML='';el2.className='';return}
  const ok=p1===p2;
  ic.innerHTML=ok?'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>':'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';
  ic.style.color=ok?'var(--success)':'var(--danger)';el2.className=ok?'ok':'error';
}

async function doRegister(){
  const name=document.getElementById('regName').value.trim();
  const email=document.getElementById('regEmail').value.trim().toLowerCase();
  const pass=document.getElementById('regPass').value;
  const pass2=document.getElementById('regPass2').value;

  if(!name||!email||!pass||!pass2){showAlert('All fields are required.');return}
  if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){showAlert('Enter a valid email address.');return}
  if(passwordStrength(pass)<3){showAlert('Password is too weak. Add uppercase, numbers, and symbols.');return}
  if(pass!==pass2){showAlert('Passwords do not match.');return}

  try {
    const res = await fetch('api/register.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({name, email, password: pass})
    });
    const data = await res.json();
    if(data.error) {
      showAlert(data.error);
    } else {
      showAlert('Account created! <a href="#" onclick="switchTab(\'login\')" style="color:var(--success);font-weight:600">Sign in to start your lesson →</a>','suc');
      setTimeout(()=>{
        const emailInput = document.getElementById('loginEmail');
        if(emailInput) emailInput.value=email;
      }, 500);
    }
  } catch (e) {
    showAlert('Server error during registration.');
  }
}

async function doLogin(){
  const email=document.getElementById('loginEmail').value.trim().toLowerCase();
  const pass=document.getElementById('loginPass').value;
  if(!email||!pass){showAlert('Enter your email and password.');return}

  try {
    const res = await fetch('api/login.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({email, password: pass})
    });
    const data = await res.json();
    if(data.error) {
      showAlert(data.error);
    } else {
      showDashboard(data.user);
    }
  } catch (e) {
    showAlert('Server error during login.');
  }
}

async function doLogout(){
  await fetch('api/logout.php');
  location.reload();
}

function showDashboard(user){
  document.getElementById('authCard').style.display='none';
  const ds=document.getElementById('dashSection');ds.style.display='';
  document.getElementById('avatarEl').textContent=user.name.charAt(0).toUpperCase();
  document.getElementById('dashName').textContent=user.name;
}

function gotoStep(n){
  currentStep=n;
  ['step1','step2','step3'].forEach((id,i)=>document.getElementById(id).style.display=(i+1===n)?'':'none');
  ['step1Btn','step2Btn','step3Btn'].forEach((id,i)=>{
    const el=document.getElementById(id);
    el.className='step'+(i+1<n?' done':i+1===n?' active':'');
  });
  document.getElementById('progressFill').style.width=((n-1)/2*100)+'%';
}

function updateQuery(){
  const e=document.getElementById('labEmail').value||'';
  const p=document.getElementById('labPass').value||'';
  const q=`SELECT id, email, name, role, secret FROM users WHERE email = '${e}' AND password = '${p}';`;
  document.getElementById('queryPreview').textContent=q;
}

function fillNormal(){document.getElementById('labEmail').value='alice@corp.com';document.getElementById('labPass').value='password123';updateQuery();document.getElementById('resultArea').style.display='none';document.getElementById('explainBox').className='explanation'}
function fillAttack1(){document.getElementById('labEmail').value="' OR '1'='1";document.getElementById('labPass').value="' OR '1'='1";updateQuery();document.getElementById('resultArea').style.display='none';document.getElementById('explainBox').className='explanation'}
function fillAttack2(){document.getElementById('labEmail').value="admin@corp.com' --";document.getElementById('labPass').value='anything';updateQuery();document.getElementById('resultArea').style.display='none';document.getElementById('explainBox').className='explanation'}

async function runQuery(){
  const e=document.getElementById('labEmail').value;
  const p=document.getElementById('labPass').value;
  
  try {
    const res = await fetch('api/vulnerable_lab.php', {
      method: 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify({email: e, password: p})
    });
    const data = await res.json();
    
    document.getElementById('queryPreview').textContent = data.query;
    
    const rows = data.results;
    let explain = '';
    let isExploited = false;

    // Detect if exploitation happened for the UI feedback
    const isAttack1=/or\s+'?1'?\s*=\s*'?1/i.test(e+p);
    const isAttack2=/--/.test(e);
    const isNormal=e==='alice@corp.com'&&p==='password123';

    if(isAttack1 && rows.length > 1){
        isExploited=true;
        explain='<strong>Exploited!</strong> The injection <code>OR \'1\'=\'1\'</code> made the WHERE clause always true — ALL rows returned from the real database. Attacker is now logged in as admin without knowing any password.';
    } else if(isAttack2 && rows.length === 1 && rows[0].email === 'admin@corp.com'){
        isExploited=true;
        explain='<strong>Exploited!</strong> The comment sequence <code>--</code> caused the database to ignore the password check entirely. The attacker logged in as admin with any password.';
    } else if(isNormal && rows.length === 1){
        explain='<strong>Normal login:</strong> Only Alice\'s record returned. The query worked correctly with valid credentials.';
    } else if(rows.length > 0) {
        explain='Results returned from database. Matches found.';
    } else {
        explain='No rows returned. The credentials did not match any user (login failed).';
    }

    const tbl=document.getElementById('resultTable');
    let html='<tr><th>id</th><th>email</th><th>name</th><th>role</th><th>secret</th></tr>';
    if(rows.length===0)html+='<tr><td colspan="5" style="color:var(--muted);text-align:center;padding:12px">— no results —</td></tr>';
    rows.forEach(r=>html+=`<tr class="${isExploited?'highlight':''}"><td>${r.id}</td><td>${r.email}</td><td>${r.name}</td><td>${r.role}</td><td>${r.secret}</td></tr>`);
    tbl.innerHTML=html;
    
    const eb=document.getElementById('explainBox');eb.innerHTML=explain;eb.className='explanation show';
    document.getElementById('resultArea').style.display='';

  } catch (e) {
    showAlert('Server error running lab query.');
  }
}

function completeLesson(){document.getElementById('completeBanner').style.display='';document.getElementById('progressFill').style.width='100%';['step1Btn','step2Btn','step3Btn'].forEach(id=>document.getElementById(id).className='step done')}
</script>
