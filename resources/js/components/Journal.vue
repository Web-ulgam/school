<template>
    <div class="root-container">
        <div class="flex flex-wrap">
            <div class="w-1/12 px-1">
                <label class="text-black">Çärýek</label>
                <select class="mt-2 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="semester" @change="semester_change()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="w-3/12 px-1">
                <label class="text-black">Sene</label>
                <div class="mt-2 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <VueDatePicker v-model="date" @onChange="date_change()" :locale="datepicker_locale" format="DD.MM.YYYY" placeholder="" :disabled="date_disabled" />
                </div>
            </div>
            <div class="w-3/12 px-1">
                <label class="text-black">Ders</label>
                <select class="mt-2 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="lesson" @change="lesson_change()" :disabled="lesson_disabled">
                    <option v-for="subject in subjects" :value="setTimetableValue(subject)">
                        {{ subject.lesson.name }}
                    </option>
                </select>
            </div>
            <div class="w-3/12 px-1">
                <label class="text-black">Mulgallym</label>
                <input type="text" class="mt-2 block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="teacher" disabled />
            </div>
            <div class="w-2/12 px-1 text-right pt-6">
                <button @click="saveJournal" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Tamamla</button>
            </div>
            <div class="w-1/2 px-1 pt-2">
                <label class="text-black">Tema</label>
                <input type="text" class="mt-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" v-model="topic">
            </div>
            <div class="w-1/2 px-1 pt-2">
                <label class="text-black">Öý işi</label>
                <input type="text" class="mt-2 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" v-model="homework">
            </div>
        </div>

       <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                <div class="w-3/12 px-4 py-3">Ady</div>
                <div class="w-9/12 px-4 py-3">Amal</div>
            </div>
            <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300" v-for="(student, index) in users">
                <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ student.user.name }}</div>
                <div class="w-9/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight cursor-pointer" @click="applyActionTo(student.id)">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" type="text" v-model="student_models[index].mark" disabled>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JournalMark from './JournalMark.vue'
    import Swal from 'sweetalert2'
    import { VueDatePicker } from '@mathieustan/vue-datepicker';
    import '@mathieustan/vue-datepicker/dist/vue-datepicker.min.css';
    import tm from '../locale/tm'

    export default {
        props: ['grade', 'students', 'subjects-endpoint', 'journals-set-endpoint', 'journals-get-endpoint'],
         components: {
            VueDatePicker
        },
        data() {
            return {
                semester: null,
                date: null,
                day: null,
                lesson: null,
                topic: '',
                homework: '',
                teacher: '',
                date_disabled: true,
                lesson_disabled: true,
                subjects: [],
                users: [],
                student_models: [], // {id: 3, mark: 5}
                datepicker_locale: tm
            };
        },
        methods: {
            semester_change() {
                this.date_disabled = false;

                this.setSubjects();
                this.getJournal();
            },
            date_change() {
                this.day = new Date(this.date).toLocaleString("en", { weekday: "long" });

                this.lesson_disabled = false;
                this.setSubjects();
                this.getJournal();
            },
            lesson_change() {
                this.getJournal();
                let timetable_lesson = JSON.parse(this.lesson);
                this.teacher = timetable_lesson.teacher.name;
            },
            applyActionTo(id) {
                this.$modal.show(JournalMark, {student: id}, { height: '140px' });
            },
            setTimetableValue(subject) {
                return JSON.stringify(subject);
            },
            setStudentsModels() {
                this.users.forEach(user => {
                    this.student_models.push({id: user.id, mark: user.mark});
                });
            },
            async setSubjects() {
                if (! this.grade || ! this.semester || !this.day) {
                    return;
                }

                let formData = new FormData();
                formData.append('_token', document.querySelector('input[name=_token]').value);
                formData.append('grade', this.grade);
                formData.append('semester', this.semester);
                formData.append('day', this.day);

                let response = await axios.post(this.subjectsEndpoint, formData);
                this.subjects = response.data;
                if (response.data.length < 1) {
                    this.teacher = '';
                }
            },
            async saveJournal() {
                if (! this.journalsSetEndpoint || ! this.fieldsAreFilled()) {
                    Swal.fire('', 'Maglumatlary dolduryň', 'error');
                    return;
                }

                let formData = new FormData();
                formData.append('_token', document.querySelector('input[name=_token]').value);
                formData.append('semester', this.semester);
                formData.append('date', this.date);
                formData.append('lesson', this.lesson);
                formData.append('topic', this.topic);
                formData.append('homework', this.homework);
                formData.append('students', JSON.stringify(this.student_models));

                let response = await axios.post(this.journalsSetEndpoint, formData);
                console.log(response.data);
                if (response.data.success == 'true') {
                    Swal.fire('Üstünlikli ýerine ýetirildi.', '', 'success');
                }
            },
            async getJournal() {
                if (this.semester && this.date && this.lesson) {

                    let formData = new FormData();
                    formData.append('_token', document.querySelector('input[name=_token]').value);
                    formData.append('grade', this.grade);
                    formData.append('semester', this.semester);
                    formData.append('date', this.date);
                    formData.append('lesson', this.lesson);

                    let response = await axios.post(this.journalsGetEndpoint, formData);
                    if (response.data) {
                        this.topic = response.data.topic;
                        this.homework = response.data.homework;

                        // Student marks
                        let students = JSON.parse(response.data.students);
                        students.forEach((student, i) => {
                            if (this.student_models[i].id == student.id) {
                                this.student_models[i].mark = student.mark; 
                            }
                        });
                    } else {
                        this.topic = '';
                        this.homework = '';
                        this.student_models.forEach(student => {
                            student.mark = '';
                        });
                    }
                }
            },
            fieldsAreFilled() {
                if ( !this.semester && !this.date && ! this.lesson ) return false;

                if (! (this.topic.length > 1)) {
                    return false;
                }

                if (! (this.homework.length > 1)) {
                    return false;
                }

                return true;
            }
        },
        mounted() {
            this.users = JSON.parse(this.students);
            this.setStudentsModels();

            Event.listen_me('journal-mark', (argument) => {
                for (let i = 0; i < this.student_models.length; i++) {
                    if (this.student_models[i].id == argument.detail.student) {
                        this.student_models[i].mark = argument.detail.mark;
                    }
                }
            });
        }
    };
</script>
