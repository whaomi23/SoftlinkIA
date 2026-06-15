// Page loader typing + progress + fade out
(function(){
    const loader = document.getElementById('page-loader');
    if(!loader) return;
    const typingEl = document.getElementById('loader-typing');
    const ring = document.getElementById('loader-progress');
    const userName = window.USER_NAME || '';
    const messages = [
        'BIenvenido A Sofltikia / Academy ',
        `Hola, ${userName}!`,
        'Preparando tu experiencia...',
        'Cargando recomendaciones...'
    ];
    let idx = 0, char = 0; let progress = 0;
    const MIN_LOADER_MS = 3800;
    const startMs = performance.now();
    const AUTO_BUDDY_GREETING = true;

    function type(){
        const msg = messages[idx];
        typingEl.textContent = msg.slice(0, ++char);
        if (char === msg.length) {
            setTimeout(()=>{ idx = (idx+1)%messages.length; char = 0; }, 800);
        }
    }

    const typeTimer = setInterval(type, 60);
    const barTimer = setInterval(()=>{
        progress += Math.random() * 7 + 2;
        if (progress > 100) progress = 100;
        const sweep = Math.floor(progress * 3.6);
        ring.style.background = `radial-gradient(circle at center, black 60%, transparent 61%), conic-gradient(#22d3ee 0deg, #22d3ee ${sweep/2}deg, #a855f7 ${sweep/2}deg ${sweep}deg, rgba(255,255,255,.07) ${sweep}deg 360deg)`;
    }, 120);

    window.addEventListener('load', ()=>{
        const elapsed = performance.now() - startMs;
        const wait = Math.max(0, MIN_LOADER_MS - elapsed);
        setTimeout(()=>{
            progress = 100;
            const sweep = 360;
            ring.style.background = `radial-gradient(circle at center, black 60%, transparent 61%), conic-gradient(#22d3ee 0deg, #22d3ee ${sweep/2}deg, #a855f7 ${sweep/2}deg ${sweep}deg, rgba(255,255,255,.07) ${sweep}deg 360deg)`;
            clearInterval(typeTimer); clearInterval(barTimer);
            if (AUTO_BUDDY_GREETING) {
                const bubble = document.getElementById('sl-friend-bubble');
                if (bubble) {
                    bubble.textContent = `¡Hola ${userName}! Bienvenido a SoftlinkIA ✨`;
                    bubble.classList.remove('hidden');
                    setTimeout(()=> bubble.classList.add('hidden'), 3200);
                }
            }
            loader.classList.add('hidden');

            if (AUTO_BUDDY_GREETING) {
                setTimeout(()=>{
                    const mbubble = document.getElementById('sl-friend-main-bubble');
                    if (mbubble) {
                        mbubble.classList.remove('hidden');
                        setTimeout(()=> mbubble.classList.add('hidden'), 3500);
                    }
                }, 1200);
            }
        }, wait);
    });
})();

// Draggable assistant (persistent buddy)
(function(){
    const avatar = document.getElementById('sl-friend-main-avatar');
    const wrapper = document.getElementById('sl-friend-main');
    if(!avatar || !wrapper) return;
    const EMOJIS = ['😂','👀','🤪','😍','🥺','🙂','😊','🤭','🤩','😱','🥳','🧐'];
    const TOASTS = [
        '¡Hey! Soy tu amigo SoftlinkIA. ¿Listo para aprender?',
        'Puedo acompañarte mientras exploras. Arrástrame donde quieras.',
        'Tip: Explora "Cursos en tendencia", están brutales.',
        'Busca arriba o filtra por categorías. Fácil y rápido.',
        '¿Continuamos donde te quedaste? Vamos a por ese 100%!',
        'Si algo no carga, actualiza o avísame con un clic 😄'
    ];
    let isDown = false; let sx=0, sy=0; let startLeft=0, startTop=0;
    function getPos(){ const r = wrapper.getBoundingClientRect(); return { left: r.left, top: r.top }; }
    function setPos(left, top){ wrapper.style.left = left + 'px'; wrapper.style.top = top + 'px'; wrapper.style.right = 'auto'; wrapper.style.bottom = 'auto'; }

    avatar.addEventListener('mousedown', (e)=>{
        isDown = true; avatar.classList.add('dragging');
        const pos = getPos(); startLeft = pos.left; startTop = pos.top; sx = e.clientX; sy = e.clientY;
    });
    window.addEventListener('mousemove', (e)=>{
        if(!isDown) return;
        const dx = e.clientX - sx; const dy = e.clientY - sy;
        setPos(startLeft + dx, startTop + dy);
    });
    window.addEventListener('mouseup', ()=>{ isDown = false; avatar.classList.remove('dragging'); });

    avatar.addEventListener('touchstart', (e)=>{
        e.preventDefault();
        isDown = true; avatar.classList.add('dragging');
        const t = e.touches[0]; const pos = getPos(); startLeft = pos.left; startTop = pos.top; sx = t.clientX; sy = t.clientY;
    }, { passive: false });
    window.addEventListener('touchmove', (e)=>{
        if(!isDown) return;
        e.preventDefault();
        const t = e.touches[0];
        const dx = t.clientX - sx; const dy = t.clientY - sy;
        setPos(startLeft + dx, startTop + dy);
    }, { passive: false });
    window.addEventListener('touchend', ()=>{ isDown = false; avatar.classList.remove('dragging'); });

    function spawnEmoji(x, y){
        const e = document.createElement('div');
        e.textContent = EMOJIS[Math.floor(Math.random()*EMOJIS.length)];
        e.style.position = 'fixed'; e.style.left = x+'px'; e.style.top = y+'px';
        e.style.fontSize = '22px'; e.style.pointerEvents='none'; e.style.zIndex='9999';
        e.style.transition = 'transform .8s ease, opacity .8s ease';
        document.body.appendChild(e);
        requestAnimationFrame(()=>{ e.style.transform = 'translateY(-40px) scale(1.3)'; e.style.opacity='0'; });
        setTimeout(()=> e.remove(), 850);
    }

    function showToast(){
        const mb = document.getElementById('sl-friend-main-bubble');
        if(!mb) return; mb.textContent = TOASTS[Math.floor(Math.random()*TOASTS.length)]; mb.classList.remove('hidden');
        clearTimeout((mb)._t); (mb)._t = setTimeout(()=> mb.classList.add('hidden'), 3200);
    }

    avatar.addEventListener('click', (e)=>{ spawnEmoji(e.clientX, e.clientY); showToast(); });
    avatar.addEventListener('touchend', (e)=>{ const t=e.changedTouches[0]; spawnEmoji(t.clientX, t.clientY); showToast(); });
})();

// Hero buddy toast sequence
(function(){
    const hero = document.getElementById('hero-section');
    const bubble = document.getElementById('hero-buddy-bubble');
    const text = document.getElementById('hero-buddy-text');
    if(!hero || !bubble || !text) return;
    const userName = window.USER_NAME || '';
    const PHRASES = [
        `¡Hola ${userName}! Bienvenido a tu espacio de aprendizaje 🚀`,
        'Explora el catálogo o continúa con tus cursos. Yo te acompaño 👀',
        'Tip: mueve el amigo para que no estorbe y haz click para emojis 🥳'
    ];
    let i = 0;
    function next(){
        if(i >= PHRASES.length) { bubble.classList.add('hidden'); return; }
        text.textContent = PHRASES[i++];
        bubble.classList.remove('hidden');
        setTimeout(()=>{ bubble.classList.add('hidden'); setTimeout(next, 900); }, 2600);
    }
    window.addEventListener('load', ()=> setTimeout(next, 1200));
})();

// Hero Carousel
(function(){
    const root = document.getElementById('hero-carousel');
    if(!root) return;
    const slides = root.querySelectorAll('.carousel-slide');
    const dots = root.querySelectorAll('.carousel-dot');
    let idx = 0; let timer;

    function show(i){
        slides.forEach((s, si)=>{
            s.classList.toggle('hidden', si !== i);
            s.classList.toggle('active', si === i);
        });
        dots.forEach((d, di)=>{
            d.classList.toggle('active', di === i);
        });
        idx = i;
    }

    function next(){ show((idx + 1) % slides.length); }
    function prev(){ show((idx - 1 + slides.length) % slides.length); }
    function autoplay(){ clearInterval(timer); timer = setInterval(next, 6000); }

    root.querySelector('[data-carousel-next]')?.addEventListener('click', ()=>{ next(); autoplay(); });
    root.querySelector('[data-carousel-prev]')?.addEventListener('click', ()=>{ prev(); autoplay(); });
    dots.forEach((d, i)=> d.addEventListener('click', ()=>{ show(i); autoplay(); }));

    let startX = 0, startY = 0, isDragging = false;
    root.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
        isDragging = true;
    }, { passive: true });

    root.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        const currentX = e.touches[0].clientX;
        const currentY = e.touches[0].clientY;
        const diffX = startX - currentX;
        const diffY = startY - currentY;

        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
            if (diffX > 0) {
                next();
            } else {
                prev();
            }
            autoplay();
            isDragging = false;
        }
    }, { passive: true });

    root.addEventListener('touchend', () => {
        isDragging = false;
    }, { passive: true });

    slides.forEach((s, i)=> s.classList.add(i===0? 'active' : 'hidden'));
    dots[0]?.classList.add('active');
    autoplay();
})();

// Parallax mouse move on container
(function(){
    const container = document.querySelector('[data-tilt-container]');
    if(!container) return;
    const layers = container.parentElement.querySelectorAll('.parallax-layer');
    container.addEventListener('mousemove', (e)=>{
        const rect = container.getBoundingClientRect();
        const px = (e.clientX - rect.left) / rect.width - 0.5;
        const py = (e.clientY - rect.top) / rect.height - 0.5;
        layers.forEach((l, i)=>{
            const depth = (i+1) * 10;
            l.style.transform = `translate(${px * depth}px, ${py * depth}px)`;
        });
    });

    const magnets = container.querySelectorAll('.magnet');
    magnets.forEach(btn => {
        btn.addEventListener('mousemove', (e)=>{
            const r = btn.getBoundingClientRect();
            const x = e.clientX - (r.left + r.width/2);
            const y = e.clientY - (r.top + r.height/2);
            btn.style.transform = `translate(${x * 0.08}px, ${y * 0.08}px)`;
        });
        btn.addEventListener('mouseleave', ()=>{
            btn.style.transform = 'translate(0,0)';
        });
    });

    const tilts = document.querySelectorAll('.tilt-card');
    tilts.forEach(card => {
        card.addEventListener('mousemove', (e)=>{
            const r = card.getBoundingClientRect();
            const x = e.clientX - (r.left + r.width/2);
            const y = e.clientY - (r.top + r.height/2);
            const rx = (y / r.height) * -10;
            const ry = (x / r.width) * 10;
            card.style.transform = `perspective(900px) rotateX(${rx}deg) rotateY(${ry}deg)`;
        });
        card.addEventListener('mouseleave', ()=>{
            card.style.transform = 'perspective(900px) rotateX(0deg) rotateY(0deg)';
        });
    });

    const observer = new IntersectionObserver((entries)=>{
        entries.forEach(ent => {
            if (ent.isIntersecting) {
                ent.target.classList.add('is-visible');
                observer.unobserve(ent.target);
            }
        });
    }, { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
})();

// Simple 3D-ish particles (stars) with mouse parallax
(function(){
    const cvs = document.getElementById('hero-particles');
    if(!cvs) return;
    const ctx = cvs.getContext('2d');
    let w, h, dpr;
    let particles = [];
    const NUM = 60;

    function resize(){
        dpr = window.devicePixelRatio || 1;
        w = cvs.clientWidth; h = cvs.clientHeight;
        cvs.width = w * dpr; cvs.height = h * dpr;
        ctx.setTransform(dpr,0,0,dpr,0,0);
    }
    window.addEventListener('resize', resize, { passive: true });
    resize();

    function init(){
        particles = new Array(NUM).fill(0).map(()=>({
            x: Math.random()*w,
            y: Math.random()*h,
            z: Math.random()*2 + 0.5,
            r: Math.random()*2 + 0.5,
            vx: (Math.random()-0.5)*0.3,
            vy: (Math.random()-0.5)*0.3,
        }));
    }
    init();

    let mx = 0, my = 0;
    cvs.addEventListener('mousemove', (e)=>{
        const rect = cvs.getBoundingClientRect();
        mx = (e.clientX - rect.left) / rect.width - .5;
        my = (e.clientY - rect.top) / rect.height - .5;
    });

    function step(){
        ctx.clearRect(0,0,w,h);
        particles.forEach(p=>{
            p.x += p.vx + mx * p.z;
            p.y += p.vy + my * p.z;
            if (p.x < -20) p.x = w+20; if (p.x > w+20) p.x = -20;
            if (p.y < -20) p.y = h+20; if (p.y > h+20) p.y = -20;

            const grd = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, 12);
            grd.addColorStop(0, 'rgba(34,211,238,.9)');
            grd.addColorStop(1, 'rgba(34,211,238,0)');
            ctx.fillStyle = grd;
            ctx.beginPath();
            ctx.arc(p.x, p.y, 12, 0, Math.PI*2);
            ctx.fill();
        });

        for (let i = 0; i < particles.length; i++) {
            for (let j = i+1; j < particles.length; j++) {
                const a = particles[i], b = particles[j];
                const dx = a.x - b.x, dy = a.y - b.y; const dist = Math.hypot(dx, dy);
                if (dist < 120) {
                    ctx.strokeStyle = `rgba(99,102,241, ${1 - dist/120})`;
                    ctx.lineWidth = 1;
                    ctx.beginPath(); ctx.moveTo(a.x, a.y); ctx.lineTo(b.x, b.y); ctx.stroke();
                }
            }
        }
        requestAnimationFrame(step);
    }
    step();
})();

// Global Matrix rain with tech/educational phrases
(function(){
    const canvas = document.getElementById('matrix-canvas');
    if(!canvas) return;
    const ctx = canvas.getContext('2d');
    let w, h, dpr; let columns; let drops;

    const techPhrases = [
        'Laravel', 'PHP', 'JavaScript', 'React', 'Vue.js', 'Node.js', 'Python', 'Django',
        'Machine Learning', 'AI', 'Blockchain', 'Cloud Computing', 'DevOps', 'Docker',
        'Kubernetes', 'AWS', 'Azure', 'Git', 'GitHub', 'API', 'REST', 'GraphQL',
        'Database', 'MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'Elasticsearch',
        'Web Development', 'Mobile App', 'iOS', 'Android', 'Flutter', 'React Native',
        'Cybersecurity', 'Ethical Hacking', 'Penetration Testing', 'Firewall', 'SSL',
        'Data Science', 'Big Data', 'Analytics', 'Business Intelligence', 'SQL',
        'Frontend', 'Backend', 'Full Stack', 'UI/UX', 'Design', 'Figma', 'Sketch',
        'Agile', 'Scrum', 'Kanban', 'CI/CD', 'Testing', 'Unit Tests', 'Integration',
        'Microservices', 'Serverless', 'Lambda', 'Functions', 'Containers', 'Virtualization',
        'Networking', 'TCP/IP', 'HTTP/HTTPS', 'DNS', 'Load Balancing', 'CDN',
        'Version Control', 'Branching', 'Merge', 'Pull Request', 'Code Review',
        'Performance', 'Optimization', 'Caching', 'CDN', 'Minification', 'Compression',
        'Responsive Design', 'Mobile First', 'Progressive Web App', 'PWA',
        'E-commerce', 'Payment Gateway', 'Stripe', 'PayPal', 'Security', 'Authentication',
        'Authorization', 'JWT', 'OAuth', 'SAML', 'Multi-factor', '2FA', 'Biometric',
        'Cloud Storage', 'S3', 'Dropbox', 'Google Drive', 'Backup', 'Recovery',
        'Monitoring', 'Logging', 'Metrics', 'Alerting', 'Dashboard', 'Grafana',
        'Automation', 'Scripting', 'Bash', 'PowerShell', 'Cron', 'Scheduled Tasks',
        'Education', 'Learning', 'Course', 'Tutorial', 'Certification', 'Skill',
        'Career', 'Job', 'Interview', 'Resume', 'Portfolio', 'Project', 'Experience'
    ];

    const glyphs = 'アカサタナハマヤラワ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let phraseColumns = [];

    function resize(){
        dpr = window.devicePixelRatio || 1;
        w = canvas.clientWidth; h = canvas.clientHeight;
        canvas.width = w * dpr; canvas.height = h * dpr; ctx.setTransform(dpr,0,0,dpr,0,0);
        const fontSize = 14; columns = Math.floor(w / fontSize); drops = new Array(columns).fill(1);
        ctx.font = `${fontSize}px monospace`;

        phraseColumns = [];
        for(let i = 0; i < columns; i += 8) {
            if(Math.random() > 0.7) {
                phraseColumns.push({
                    x: i,
                    phrase: techPhrases[Math.floor(Math.random() * techPhrases.length)],
                    y: -Math.random() * 200,
                    speed: 0.5 + Math.random() * 1.5,
                    opacity: 0.3 + Math.random() * 0.4
                });
            }
        }
    }
    resize();
    window.addEventListener('resize', resize, { passive:true });

    function step(){
        ctx.fillStyle = 'rgba(15, 23, 42, 0.12)';
        ctx.fillRect(0, 0, w, h);

        for (let i = 0; i < drops.length; i++) {
            const text = glyphs[Math.floor(Math.random() * glyphs.length)];
            const x = i * 14; const y = drops[i] * 14;
            ctx.fillStyle = 'rgba(34, 211, 238, .6)';
            ctx.fillText(text, x, y);
            if (y > h && Math.random() > 0.975) drops[i] = 0;
            drops[i]++;
        }

        phraseColumns.forEach((col, index) => {
            col.y += col.speed;
            ctx.fillStyle = `rgba(99, 102, 241, ${col.opacity})`;
            ctx.font = 'bold 12px monospace';
            ctx.fillText(col.phrase, col.x * 14, col.y);

            if(col.y > h + 50) {
                col.y = -50;
                col.phrase = techPhrases[Math.floor(Math.random() * techPhrases.length)];
                col.speed = 0.5 + Math.random() * 1.5;
                col.opacity = 0.3 + Math.random() * 0.4;
            }
        });

        if(Math.random() > 0.98 && phraseColumns.length < 15) {
            const newCol = Math.floor(Math.random() * columns);
            if(!phraseColumns.some(col => Math.abs(col.x - newCol) < 8)) {
                phraseColumns.push({
                    x: newCol,
                    phrase: techPhrases[Math.floor(Math.random() * techPhrases.length)],
                    y: -50,
                    speed: 0.5 + Math.random() * 1.5,
                    opacity: 0.3 + Math.random() * 0.4
                });
            }
        }

        requestAnimationFrame(step);
    }
    step();
})();

