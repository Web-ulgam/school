<template>
    <div class="p-5 flex flex-wrap">
        <div class="w-full mb-5 flex">
            <div class="w-1/2">
                <label>Gatnaşyk: </label>
                <toggle-button v-model="attendance" :labels="{checked: 'Bar', unchecked: 'Ýok'}" :width="70" :height="30" :font-size="14" />
            </div>
            <div class="w-1/2 text-right">
                <button @click="setClear" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded h-full">Arassala</button>
            </div>
        </div>

        <div class="w-full" v-if="attendance">
            <label>Baha: </label>
            <span class="bg-blue-600 text-white p-3 rounded cursor-pointer" @click="setMark(2)">2</span> 
            <span class="bg-blue-600 text-white p-3 rounded cursor-pointer" @click="setMark(3)">3</span>
            <span class="bg-blue-600 text-white p-3 rounded cursor-pointer" @click="setMark(4)">4</span>
            <span class="bg-blue-600 text-white p-3 rounded cursor-pointer" @click="setMark(5)">5</span>
        </div>
        <div class="w-full" v-else>
            <div class="flex flex-wrap">
                <div class="w-3/4 pr-1">
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="attendance_reason">
                        <option value="allowed">Rugsatly</option>
                        <option value="not_allowed">Rugsatsyz</option>
                    </select>
                </div>
                <div class="w-1/4">
                    <button @click="setAbsent" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded h-full">Tamamla</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['student'],
        data() {
            return {
                attendance: true,
                attendance_reason: 'allowed'
            };
        },
        methods: {
            setAbsent() {
                let classic = this.attendance_reason == 'allowed' ? 'GM. Rugsatly' : 'GM. Rugsatsyz';
                
                this.setMark(classic);
            },
            setClear() {
                this.setMark('');
            },
            setMark(mark) {
                Event.fire_me('journal-mark', {mark: mark, student: this.student});
                this.$emit('close');
            }
        }
    };
</script>
