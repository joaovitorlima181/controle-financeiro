<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <aside id="navigation-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div id='sidebar' class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800"
            onmouseover="openSidebar()" onmouseout="collapseSidebar()">
            <ul class="space-y-2 font-medium">
                <x-sidebar.item title="Dashboard" href="{{ route('dashboard') }}" icon="dashboard"/>
                <x-sidebar.dropdown dropdownId="dropdown-cash-flow" dropdownTitle="Fluxo de Caixa" icon="monetization_on">
                    <x-sidebar.dropdown-item title="Entradas" href="{{ route('entries') }}" icon="attach_money"/>
                    <x-sidebar.dropdown-item title="Saídas" href="{{ route('outflows') }}" icon="attach_money"/>
                </x-sidebar.dropdown>
                <x-sidebar.dropdown dropdownId="dropdown-settings" dropdownTitle="Configurações" icon="settings">
                    <x-sidebar.dropdown-item title="Tipos de Entrada" href="{{ route('entry-types') }}" icon="attach_money"/>
                </x-sidebar.dropdown>
            </ul>
        </div>
    </aside>
</nav>
