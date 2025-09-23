<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>Kopači, Novo Goražde, Bosna i Hercegovina</small>
            <small class="ms-4"><i class="fa fa-phone-alt me-2"></i>+387 61 540 451</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Pratite nas na:</small>
            <a class="text-body ms-3" href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
            <a class="text-body ms-3" href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
            <a class="text-body ms-3" href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">Porodično<span class="text-secondary"> pčelarstvo</span> Kanlić</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Početna</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link">O nama</a>
                <a href="{{ url('/product') }}" class="nav-item nav-link">Proizvodi</a>
                <a href="{{ url('/blog') }}" class="nav-item nav-link">Vijesti</a>
                <a href="{{ url('/contact') }}" class="nav-item nav-link">Kontakt</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="#" aria-label="Search">
                    <small class="fa fa-search text-body"></small>
                </a>
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="#" aria-label="User">
                    <small class="fa fa-user text-body"></small>
                </a>
                <a class="btn-sm-square bg-white rounded-circle ms-3 position-relative" href="{{ route('cart.index') }}" aria-label="Shopping Bag">
                    <small class="fa fa-shopping-bag text-body"></small>
                    @php $cartCount = is_array(session('cart')) ? array_sum(session('cart')) : 0; @endphp
                    @if($cartCount > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.7rem;">{{ $cartCount }}</span>
                    @endif
                </a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<!-- Responsive typography for small devices -->
<style>
@media (max-width: 576px) {
    .navbar-brand h1 { font-size: 1.75rem; }
    .navbar-nav .nav-link { font-size: 1.05rem; line-height: 1.4; }
    .dropdown-menu .dropdown-item { font-size: 1rem; }
    .btn-sm-square small { font-size: 1rem; }
}
@media (min-width: 577px) and (max-width: 768px) {
    .navbar-nav .nav-link { font-size: 1rem; }
}
</style>

<!-- Chatbot Widget Start -->
<style>
#chatbot-toggle-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 10000;
    width: 56px;
    height: 56px;
    border-radius: 50%;
    background: linear-gradient(135deg, #38b000 70%, #70e000 100%);
    color: #fff;
    border: none;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    cursor: pointer;
    transition: background 0.2s;
}
#chatbot-toggle-btn:hover {
    background: linear-gradient(135deg, #70e000 70%, #38b000 100%);
}
#chatbot-widget {
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 350px;
    z-index: 9999;
    border-radius: 22px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    background: linear-gradient(135deg, #e6f9e7 60%, #b7e4c7 100%);
    overflow: hidden;
    display: none;
}
#chatbot-widget.active {
    display: block;
}
#chatbot-widget .card {
    border-radius: 22px;
    border: none;
    background: transparent;
    box-shadow: none;
}
#chatbot-widget .card-header {
    border-radius: 22px 22px 0 0;
    background: linear-gradient(90deg, #38b000 70%, #70e000 100%);
    color: #fff;
    font-size: 1.1rem;
    font-weight: 600;
    letter-spacing: 1px;
    border: none;
}
#chatbot-widget .card-body {
    background: #e6f9e7;
    border-radius: 0 0 18px 18px;
    min-height: 220px;
    max-height: 220px;
    overflow-y: auto;
    font-size: 0.97rem;
    padding: 1rem;
}
#chatbot-widget .card-footer {
    background: #e6f9e7;
    border-radius: 0 0 22px 22px;
    border-top: 1px solid #b7e4c7;
    padding: 0.7rem 1rem;
}
#chatbot-widget .input-group .form-control {
    border-radius: 18px;
    border: 1px solid #95d5b2;
    font-size: 0.97rem;
    margin-right: 8px;
}
#chatbot-widget .input-group .btn {
    border-radius: 18px;
    background: linear-gradient(90deg, #38b000 70%, #70e000 100%);
    border: none;
    font-weight: 500;
    margin-left: 2px;
}
#chatbot-widget .mb-2.text-end {
    background: #b7e4c7;
    border-radius: 14px 14px 0 14px;
    padding: 6px 12px;
    margin-left: 0;
    margin-bottom: 8px;
    display: block;
    text-align: left;
}
#chatbot-widget .mb-2.text-start {
    background: #e6f9e7;
    border-radius: 14px 14px 14px 0;
    padding: 6px 12px;
    margin-right: 0;
    margin-bottom: 8px;
    display: block;
    text-align: left;
}
</style>
<button id="chatbot-toggle-btn" title="Chatbot">
    <span id="chatbot-toggle-icon">💬</span>
</button>
<div id="chatbot-widget">
    <div class="card">
        <div class="card-header">
            <strong>Chatbot</strong>
            <button type="button" id="chatbot-close-btn" style="float:right;background:transparent;border:none;color:#fff;font-size:1.3rem;cursor:pointer;">&times;</button>
        </div>
        <div class="card-body" id="chatbot-messages">
            <!-- Poruke će se prikazivati ovdje -->
        </div>
        <div class="card-footer">
            <form id="chatbot-form" autocomplete="off">
                <div class="input-group">
                    <input type="text" class="form-control" id="chatbot-input" placeholder="Unesite poruku..." required>
                    <button class="btn btn-primary" type="submit">Pošalji</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
const chatbotForm = document.getElementById('chatbot-form');
const chatbotInput = document.getElementById('chatbot-input');
const chatbotMessages = document.getElementById('chatbot-messages');
const chatbotWidget = document.getElementById('chatbot-widget');
const chatbotToggleBtn = document.getElementById('chatbot-toggle-btn');
const chatbotCloseBtn = document.getElementById('chatbot-close-btn');

// Show widget if previously open in session
window.addEventListener('DOMContentLoaded', function() {
    const saved = sessionStorage.getItem('chatbotMessages');
    if (saved) {
        try {
            const arr = JSON.parse(saved);
            arr.forEach(m => appendMessage(m.sender, m.msg, m.alignClass, false));
        } catch {}
    }
    // Restore widget open/closed state
    if (sessionStorage.getItem('chatbotOpen') === '1') {
        chatbotWidget.classList.add('active');
    } else {
        chatbotWidget.classList.remove('active');
    }
});

// Toggle button logic
chatbotToggleBtn.addEventListener('click', function() {
    if (chatbotWidget.classList.contains('active')) {
        chatbotWidget.classList.remove('active');
        sessionStorage.setItem('chatbotOpen', '0');
    } else {
        chatbotWidget.classList.add('active');
        sessionStorage.setItem('chatbotOpen', '1');
    }
});

// Close button logic
chatbotCloseBtn.addEventListener('click', function() {
    chatbotWidget.classList.remove('active');
    sessionStorage.setItem('chatbotOpen', '0');
});

if (chatbotForm) {
    chatbotForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const userMsg = chatbotInput.value.trim();
        if (!userMsg) return;
        appendMessage('Vi', userMsg, 'text-end text-primary', true);
        chatbotInput.value = '';
        fetch('/chatbot/message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: userMsg })
        })
        .then(res => res.json())
        .then(data => {
            appendMessage('Bot', data.reply, 'text-start text-success', true);
        })
        .catch(() => {
            appendMessage('Bot', 'Došlo je do greške. Pokušajte ponovo.', 'text-start text-danger', true);
        });
    });
}

function appendMessage(sender, msg, alignClass, save = false) {
    const div = document.createElement('div');
    div.className = `mb-2 ${alignClass}`;
    div.innerHTML = `<strong>${sender}:</strong> ${msg}`;
    chatbotMessages.appendChild(div);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    if (save) {
        // Spremi poruku u localStorage
        let arr = [];
        try {
            arr = JSON.parse(sessionStorage.getItem('chatbotMessages')) || [];
        } catch {}
        arr.push({ sender, msg, alignClass });
        sessionStorage.setItem('chatbotMessages', JSON.stringify(arr));
    }
}
</script>
