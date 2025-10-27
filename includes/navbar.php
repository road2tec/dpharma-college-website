<div class="navbar bg-base-300 shadow-sm px-4 md:px-10 py-6 md:py-10 text-base-content">
    <!-- Left Logo and Institute Info -->
    <div class="flex-1">
        <button class="flex flex-col md:flex-row items-center gap-4 cursor-pointer text-left w-full lg:w-auto"
            onClick="window.location.href='./'">
            <div class="flex flex-col items-center">
                <img src="./assets/images/logo.png" alt="Logo" class="h-20 md:h-28 rounded-full" />
            </div>
            <div class="flex flex-col">
                <span class="text-sm md:text-lg font-bold text-error">Vidya Education Society's</span>
                <span class="text-xl md:text-3xl font-bold uppercase leading-tight">Vidya Institute of Pharmacy</span>
                <span class="text-sm md:text-lg font-semibold">DTE CODE: 5652 MSBTE: 62391</span>
                <span class="text-sm md:text-base">Approved By: PCI, DTE, Govt. Of Maharashtra, MSBTE</span>
            </div>
        </button>
    </div>

    <!-- Right Login Button -->
    <div class="hidden lg:flex">
        <button class="btn btn-primary btn-sm md:btn-md" onClick="login.showModal()">Login</button>
    </div>

    <!-- Login Modal -->
    <dialog id="login" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-center">Login to Vidya Institute of Pharmacy</h3>
            <p class="text-sm mb-2 text-base-content/50">You can use username or email to login</p>
            <form action="admin/server/login.php" method="POST" class="space-y-4">
                <input type="text" name="identifier" placeholder="Username or Email" class="input input-bordered w-full"
                    required />
                <input type="password" name="password" placeholder="Password" class="input input-bordered w-full"
                    required minlength="6" />
                <button type="submit" class="btn btn-primary w-full">Login</button>
            </form>
        </div>
    </dialog>
</div>