<div class="flex w-full h-full overflow-hidden gap-4">
    <div class="flex flex-col w-1/2 h-full">
        @livewire('chat', ['id_sala' => $reporteSeleccionado->sala()->id, 'activo' => false])
    </div>
    <div class="w-1/2 h-full overflow-y-auto">
        <ul class="list shadow-sm rounded-box">
            <!-- Inicio de placeholders -->
            <li class="list-row card p-4 gap-4 border rounded-box border-base-300 bg-base-200">
                <div class="flex justify-between">
                    <div class="flex gap-4">
                        <img class="w-24 rounded-full" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmiro.medium.com%2Fv2%2Fresize%3Afit%3A1358%2F1*Nt39X5uC-FW8A94OtpgbJg.jpeg&f=1&nofb=1&ipt=c266802ed9468629b70de37a3de9466730f2ddc7920ff71810bf882d846bd2db">
                        <img class="w-24 rounded-full" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F46%2F46%2F3f%2F46463f00c0db960a677c04f072238b82.png&f=1&nofb=1&ipt=2c28240e6d78b2d784de7bb193d60418136eb2c5079c07daaf5432cb843d0b3f">
                    </div>
                    <img class="w-24 rounded-box" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.5280.com%2F2021%2F10%2FGhosts-.jpg&f=1&nofb=1&ipt=473c013eb76ee36dff0d8d2a397d1ee03db39897bab8a5148cffc900f1984651">
                </div>
                <div class="p-4 border rounded-box border-base-300 bg-base-100">
                    <p>Este tío me ha mandado cosas inapropiadas. Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam veritatis saepe sit, nam voluptas aspernatur vero, quam beatae dolores, eligendi iusto voluptatum consectetur illo laborum placeat itaque. Fugit, corrupti distinctio!</p>
                </div>
            </li>
            <!-- Fin de placeholders -->
        </ul>
    </div>
</div>