@include('partials.header')
@include('partials.menu')

<div class="container py-10" style="padding-top: 100px;">
    <div class="row justify-content-center">
    <div class="col-lg-8 mt-5">
            <div class="card shadow-lg border-0">
                <div class="row g-0">
                    <!-- Left: Customer Info -->
                    <div class="col-md-6 p-4 border-end">
                        <h3 class="mb-4">Podaci o kupcu</h3>
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Ime i Prezime</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="street" class="form-label">Ulica i broj</label>
                                <input type="text" name="street" id="street" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="postal_code" class="form-label">Poštanski broj</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">Grad</label>
                                <input type="text" name="city" id="city" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefon</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail adresa (opcionalno)</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="info" class="form-label">Dodatne informacije</label>
                                <textarea name="info" id="info" class="form-control" rows="2"></textarea>
                            </div>
                        </form>
                    </div>
                    <!-- Right: Order Summary -->
                    <div class="col-md-6 p-4">
                        <h3 class="mb-4">Vaša narudžba</h3>
                        @php
                            $cart = session('cart', []);
                            $total = 0;
                        @endphp
                        @if(empty($cart))
                            <p>Košarica je prazna.</p>
                        @else
                            <ul class="list-group mb-3">
                                @foreach($cart as $id => $qty)
                                    @php
                                        $product = \App\Models\Product::find($id);
                                        $subtotal = $product ? $product->price * $qty : 0;
                                        $total += $subtotal;
                                    @endphp
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $product ? $product->name : 'Unknown' }} <span class="badge bg-secondary ms-2">x{{ $qty }}</span></span>
                                        <span>${{ number_format($subtotal, 2) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-end mb-4">
                                <h4>Ukupno: <span class="text-primary">${{ number_format($total, 2) }}</span></h4>
                            </div>
                            <div class="border rounded p-3" style="background-color: #fffbe6; border-color: #ffe066;">
                                <h5 class="text-warning mb-2">Plaćanje pouzećem</h5>
                                <p class="mb-1">Plaćanje gotovinom (kešom) prilikom dostave. Dostava je besplatna za iznose preko 5.000 din. u Beogradu za Zone 1 i 2. Minimum za porudžbinu je 1.500 dinara.</p>
                                <p class="mb-0">Dostava van teritorije Beograda se naplaćuje po važećem cenovniku kurirske službe.</p>
                            </div>
                            <div class="mt-3">
                                <p class="mb-2">Proizvodi poručeni do 11:00 svakog dana, isporučuju se istog dana od 17-21h. Proizvodi poručeni posle 11:00 se isporučuju sutradan u istom terminu.</p>
                                <p class="mb-2">Cene mesa i robe na merenje mogu da variraju i biće iskazane na fiskalnom računu u zavisnosti od gramaže.</p>
                                <p class="mb-0">Zadrzavamo pravo da Vas kontaktiramo ukoliko neki od artikala nemamo na stanju, a svi podaci koje ostavite biće korišćeni isključivo za procesuiranje porudžbine, obaveštenja o periodičnim nabavkama svežeg mesa i pospešivanje saradnje sa BIORGANIC timom, i neće biti davani trećim licima.</p>
                                <button type="submit" form="" class="btn btn-success w-100 mt-4">Potvrdi narudžbu</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Chatbot Widget Start -->
<div id="chatbot-widget" style="position:fixed; bottom:30px; right:30px; width:350px; z-index:9999;">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white p-2">
            <strong>Chatbot</strong>
        </div>
        <div class="card-body p-2" style="height:220px; overflow-y:auto; font-size:0.95rem;" id="chatbot-messages">
            <!-- Poruke će se prikazivati ovdje -->
        </div>
        <div class="card-footer p-2">
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

chatbotForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const userMsg = chatbotInput.value.trim();
    if (!userMsg) return;
    appendMessage('Vi', userMsg, 'text-end text-primary');
    chatbotInput.value = '';
    // Dummy AJAX
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
        appendMessage('Bot', data.reply, 'text-start text-success');
    })
    .catch(() => {
        appendMessage('Bot', 'Došlo je do greške. Pokušajte ponovo.', 'text-start text-danger');
    });
});

function appendMessage(sender, msg, alignClass) {
    const div = document.createElement('div');
    div.className = `mb-2 ${alignClass}`;
    div.innerHTML = `<strong>${sender}:</strong> ${msg}`;
    chatbotMessages.appendChild(div);
    chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
}
</script>

@include('partials.footer')
