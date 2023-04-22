<div class="nav" id="navbar">
    <nav class="nav__container">
        <div>
            {{-- <a href="#" class="nav__link nav__logo">
                <i class='bx bxs-disc nav__icon' ></i>
                <span class="nav__logo-name">E-Mekdep</span>
            </a> --}}

            <div class="nav__list">
                <div class="nav__items">
                    <h3 class="nav__subtitle">E-MEKDEP</h3>

                    <a href="{{ route('home') }}" class="nav__link active">
                        <i class='bx bx-home nav__icon'></i>
                        <span class="nav__name">Baş sahypa</span>
                    </a>

                    <a href="/chatify" class="nav__link active" target="_blank">
                        <i class='bx bx-chat nav__icon'></i>
                        <span class="nav__name">Çatlaşmak</span>
                    </a>

                    @role('mugallym')
                        <a href="{{ route('teacher.subjects') }}" class="nav__link active">
                            <i class='bx bx-grid nav__icon'></i>
                            <span class="nav__name">Okuw derslerim</span>
                        </a>
                    @endrole

                    @role('Admin')
                        <a href="{{ route('subject.index') }}" class="nav__link active">
                            <i class='bx bxs-book nav__icon'></i>
                            <span class="nav__name">Okuw dersleri</span>
                        </a>

                        <a href="{{ route('teacher.index') }}" class="nav__link active">
                            <i class='bx bxs-user-detail nav__icon' ></i>
                            <span class="nav__name">Mugallymlar</span>
                        </a>

                        <a href="{{ route('classes.index') }}" class="nav__link">
                            <i class='bx bxs-dashboard nav__icon'></i>
                            <span class="nav__name">Synplar</span>
                        </a>

                        <a href="{{ route('parents.index') }}" class="nav__link">
                            <i class='bx bx-group nav__icon'></i>
                            <span class="nav__name">Ene-atalar</span>
                        </a>

                        <a href="{{ route('student.index') }}" class="nav__link">
                            <i class='bx bxs-face nav__icon'></i>
                            <span class="nav__name">Okuwçylar</span>
                        </a>

                        <a href="{{ route('timetables.index') }}" class="nav__link">
                            <i class='bx bx-table nav__icon'></i>
                            <span class="nav__name">Tertipnama</span>
                        </a>

                        <a href="{{ route('journals.index') }}" class="nav__link">
                            <i class='bx bxs-book-bookmark nav__icon'></i>
                            <span class="nav__name">Žurnal</span>
                        </a>
                    @endrole
                </div>
            
                @role('Admin')
                <div class="nav__items">
                    <h3 class="nav__subtitle">Dolandyryş</h3>

                    <a href="{{ route('assignrole.index') }}" class="nav__link">
                        <i class='bx bx-user-circle nav__icon' ></i>
                        <span class="nav__name">Rollar</span>
                    </a>

                    <a href="{{ route('roles-permissions') }}" class="nav__link">
                        <i class='bx bxs-user-detail nav__icon' ></i>
                        <span class="nav__name">Rollar we <br> mümkinçilkleri</span>
                    </a>

                    <a href="/admin/user-activity" class="nav__link">
                        <i class='bx bxl-slack-old nav__icon' ></i>
                        <span class="nav__name">Aktiwlik</span>
                    </a>
                </div>
                @endrole
            </div>
        </div>

        <a href="#" class="nav__link nav__logout">
            <i class='bx bx-log-out nav__icon' ></i>
            <form action="{{ route('logout') }}" method="POST" class="pb-2">
                @csrf
                <button type="submit" class="nav__name">Ulgamdan çyk</button>
            </form>
        </a>
    </nav>
</div>
