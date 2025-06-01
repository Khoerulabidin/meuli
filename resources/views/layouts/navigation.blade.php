<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item  {{ Route::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- <li class="sidebar-item  {{ Route::is('Transaction.*') ? 'active' : '' }}">
            <a href="{{ route('Transaction.index') }}" class="sidebar-link">
                <i class="bi bi-coin"></i>
                <span>Transaction</span>
            </a>
        </li> --}}
        <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-coin"></i>
                <span>Transaction</span>
            </a>

            <ul class="submenu">
                <li class="submenu-item">
                    <a href="" class="submenu-link">
                        Sales Transaction</a>
                </li>
                <li class="submenu-item">
                    <a href="" class="submenu-link">Expense Transaction</a>
                </li>
                <li class="submenu-item">
                    <a href="" class="submenu-link">Receivable Payment</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-journals"></i>
                <span>Report</span>
            </a>

            <ul class="submenu">
                <li class="submenu-item">
                    <a href="" class="submenu-link">Cust Transaction</a>
                </li>
                <li class="submenu-item">
                    <a href="" class="submenu-link">Stock Transaction</a>
                </li>
                <li class="submenu-item">
                    <a href="" class="submenu-link">Stock</a>
                </li>
                <li class="submenu-item">
                    <a href="" class="submenu-link">Financial Record</a>
                </li>
            </ul>
        </li>

        {{-- @role(['Super Admin', 'Admin']) --}}
        <li
            class="sidebar-item has-sub {{ Route::is('CodeMstrList') || Route::is('TableMstrList') ? 'active' : '' }}">
            <a href="#" class="sidebar-link">
                <i class="bi bi-boxes"></i>
                <span>Master</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item">
                    <a href="{{ route('BranchMstrs.index') }}" class="submenu-link">Branch Master</a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('CodeMstrList') }}" class="submenu-link">Code Master</a>
                </li>
                <li class="submenu-item">
                    <a href="{{ route('TableMstrList') }}" class="submenu-link">Table Master</a>
                </li>
            </ul>
        </li>


        <li class="sidebar-item">
            <a href="{{ route('TrHists.index') }}" class="sidebar-link">
                <i class="bi bi-boxes"></i>
                <span>Transaction History</span>
            </a>
        </li>
        {{-- @endrole --}}


    </ul>
    <div class="p-3 border-top w-100" style="text-align:center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
</div>
