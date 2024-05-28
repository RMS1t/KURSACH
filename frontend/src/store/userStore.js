import { defineStore } from 'pinia';


export const useUserStore = defineStore('user', {
    state: () => ({
        role: localStorage.getItem('userRole') || ''
    }),
    actions: {
        setRole(role) {
            this.role = role;
            localStorage.setItem('userRole', role);
        },
        clearRole() {
            this.role = '';
            localStorage.removeItem('userRole');
        }
    },
    getters: {
        isEmployer: (state) => state.role === '1',
        isJobSeeker: (state) => state.role === '2',
        isAdmin: (state) => state.role === '0'
    }
});