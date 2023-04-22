<template>
    <div :class="container_class">
        <br>
        <h2>{{ days[day] }}</h2>

        <!-- Table start -->
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                <div class="w-1/12 px-4 py-3">#</div>
                <div class="w-4/12 px-4 py-3">Mugallym</div>
                <div class="w-4/12 px-4 py-3">Dersiň ady</div>
                <div class="w-2/12 px-4 py-3">Otag</div>
                <div class="w-1/12 px-4 py-3">Amal</div>
            </div>
            
            <template v-if="this.isObjectEmpty(this.day_data)">
                <div v-for="count in lessons_count">
                    <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                        <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            {{ count }}
                            <input type="hidden" v-model="timetable.order[count]">
                        </div>

                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            <vue-multiselect v-model="timetable.teacher[count]" :options="teachers" :close-on-select="true" :preserve-search="true" 
                                label="name" track-by="name" :preselect-first="true" :show-labels="false" :allow-empty="false" placeholder=""></vue-multiselect>
                        </div>

                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            <vue-multiselect v-model="timetable.lesson[count]" :options="subjects" :close-on-select="true" :preserve-search="true" 
                                label="name" track-by="name" :preselect-first="true" :show-labels="false" :allow-empty="false" placeholder=""></vue-multiselect>
                        </div>

                        <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" v-model="timetable.room[count]" required>
                        </div>

                        <div class="w-1/12 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            <span class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-1 px-2 mr-1 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 cursor-pointer" @click="lessons_count += 1"> + </span>
                            <template v-if="count != 1">
                                <span class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 cursor-pointer" @click="lessons_count -= 1"> - </span>
                            </template>
                        </div>
                    </div>
                </div>
            </template>

            <template v-else>
                <div v-for="count in lessons_count">
                    <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                        <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            {{ count }}
                            <input type="hidden" v-model="timetable.order[count]">
                        </div>

                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            <vue-multiselect v-model="timetable.teacher[count]" :options="teachers" :close-on-select="true" :preserve-search="true" 
                                label="name" track-by="name" :preselect-first="true" :show-labels="false" :allow-empty="false" placeholder=""></vue-multiselect>
                        </div>

                        <div class="w-4/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            <vue-multiselect v-model="timetable.lesson[count]" :options="subjects" :close-on-select="true" :preserve-search="true" 
                                label="name" track-by="name" :preselect-first="true" :show-labels="false" :allow-empty="false" placeholder=""></vue-multiselect>
                        </div>

                        <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            <input type="text" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" v-model="timetable.room[count]" required>
                        </div>

                        <div class="w-1/12 py-3 text-sm font-semibold text-gray-600 tracking-tight">
                            <span class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-1 px-2 mr-1 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 cursor-pointer" @click="lessons_count += 1"> + </span>
                            <template v-if="count != 1">
                                <span class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-1 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 cursor-pointer" @click="lessons_count -= 1"> - </span>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div class="text-right">
            <button @click="updateDay()"
                class="shadow bg-blue-500 w-full mt-2 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Ýatda sakla</button>
        </div>
        <!-- Table END -->
    </div>
</template>

<script>
    import Swal from 'sweetalert2'

    export default {
        props: [
            'semester',
            'day',
            'endpoint'
        ],
        data() {
            return {
                container_class: 'root-container',
                lessons_count: 1,
                teachers: window.Lara.teachers,
                subjects: window.Lara.subjects,
                day_data: {},
                timetable: {
                    order: [],
                    teacher: [],
                    lesson: [],
                    room: []
                },
                days: {
                    monday: 'Duşenbe', 
                    tuesday: 'Sişenbe', 
                    wednesday: 'Çarşenbe', 
                    thursday: 'Penşenbe', 
                    friday: 'Anna', 
                    saturday: 'Şenbe', 
                    sunday: 'Ýekşenbe'
                }
            };
        },
        watch: {
            lessons_count() {
                if (this.lessons_count > 6) {
                    this.lessons_count = 6;
                }
            }
        },
        methods: {
            isObjectEmpty(object) {
                let isEmpty = true;
                for (let keys in object) {
                    isEmpty = false;
                    break;
                }

                return isEmpty;
            },
            fieldsAreFilled() {
                let lessons = this.timetable['lesson'];
                let teachers = this.timetable['teacher'];
                let rooms = this.timetable['room'];

                if (lessons.length < 1 || teachers.length < 1 || rooms.length < 1) {
                    return false;
                }

                for (var i = 0; i < this.lessons_count; i++) {
                    if (lessons[i + 1] == undefined || teachers[i + 1] == undefined || rooms[i + 1] == undefined) {
                        return false;
                    }
                }

                return true;
            },
            setTimetableDatas() {
                let data_length = this.day_data.data.length;
                for (let i = 0; i < data_length; i++) {
                    this.timetable.lesson[i + 1] = this.day_data.data[i]['lesson'];
                    this.timetable.teacher[i + 1] = this.day_data.data[i]['teacher'];
                    this.timetable.room[i + 1] = this.day_data.data[i]['room'];
                }

                this.lessons_count = data_length;
            },
            updateDay() {
                if (! this.endpoint || ! this.fieldsAreFilled()) {
                    Swal.fire({
                      title: 'Maglumatlary dogry giriziň',
                      icon: 'error',
                      confirmButtonText: 'Ýap'
                    });

                    return;
                }
                
                let lessons = this.timetable['lesson'];
                let teachers = this.timetable['teacher'];
                let rooms = this.timetable['room'];

                let fields = [];
                for (let i = 0; i < this.lessons_count; i++) {
                    fields.push({
                        order: i + 1,
                        lesson: lessons[i + 1],
                        teacher: teachers[i + 1],
                        room: rooms[i + 1]
                    });
                }

                let formData = new FormData();
                formData.append('_token', document.querySelector('input[name=_token]').value);
                formData.append('semester', this.semester);
                formData.append('day', this.day);
                formData.append('data', JSON.stringify(fields));
                
                axios.post(this.endpoint, formData)
                     .then(response => { 
                        console.log(response);
                        if (response.data.success == 1) {
                            Swal.fire('Üstünlikli ýerine ýetirildi.', '', 'success');
                            // $('#info-modal-title').text('Üstünlikli ýerine ýetirildi.');
                            // $( "#info-modal" ).toggleClass( "hidden" );
                        }
                    }).catch(error => {
                        console.log(error);
                    });
            }
        },
        mounted() {
            this.container_class = 'root-container ' + this.day + '-container';
            if (window.Lara[this.day]) {
                let data = window.Lara[this.day];
                this.day_data = {
                    grade_id: data.grade_id,
                    semester: data.semester,
                    data: JSON.parse(data.data)
                };

                this.setTimetableDatas();
            }

            this.$emit('fuckyou');
        }
    }
</script>
