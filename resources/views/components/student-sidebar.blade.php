<div class="w-64 bg-blue text-white flex flex-col justify-between" x-data="{ active: '{{ $activePage }}' }">
    <div>
        <nav class="mt-8 space-y-2"> <!-- Added space-y-2 for vertical spacing between divs -->
            <div class="px-5"> 
                <a href="/student-information" href="#" @click.prevent="active = 'Information'" :class="{'bg-blue-hover': active === 'Information'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold  flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
                    <span>Information</span>
                </a>
            </div>
            <div class="px-5"> 
                <a href="/student-evaluation" @click.prevent="active = 'Evaluation'" :class="{'bg-blue-hover': active === 'Evaluation'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold flex items-center space-x-4">
                    <svg width="24" height="24" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.79211 16.8961V7.96647C1.79211 7.29777 2.12632 6.6733 2.68271 6.30237L9.68271 1.6357C10.3545 1.18784 11.2297 1.18784 11.9015 1.6357L18.9015 6.30237C19.4579 6.6733 19.7921 7.29777 19.7921 7.96647V16.8961M1.79211 16.8961C1.79211 18.0007 2.68754 18.8961 3.79211 18.8961H17.7921C18.8967 18.8961 19.7921 18.0007 19.7921 16.8961M1.79211 16.8961L8.54211 12.3961M19.7921 16.8961L13.0421 12.3961M1.79211 7.8961L8.54211 12.3961M19.7921 7.8961L13.0421 12.3961M13.0421 12.3961L11.9015 13.1565C11.2297 13.6044 10.3545 13.6044 9.68271 13.1565L8.54211 12.3961" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                        
                    <span>Evaluation</span>
                </a>
            </div>
            <div class="px-5"> 
                <a href="/student-schedules" @click.prevent="active = 'Schedule'" :class="{'bg-blue-hover': active === 'Schedule'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold  flex items-center space-x-4">
                    <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.79211 5.89648V1.89648M14.7921 5.89648V1.89648M5.79211 9.89648H15.7921M3.79211 19.8965H17.7921C18.8967 19.8965 19.7921 19.0011 19.7921 17.8965V5.89648C19.7921 4.79191 18.8967 3.89648 17.7921 3.89648H3.79211C2.68754 3.89648 1.79211 4.79191 1.79211 5.89648V17.8965C1.79211 19.0011 2.68754 19.8965 3.79211 19.8965Z" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>   
                    <span>Schedule</span>
                </a>
            </div>
            <div class="px-5"> 
                <a href="/student-grades" @click.prevent="active = 'Grades'" :class="{'bg-blue-hover': active === 'Grades'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold flex items-center space-x-4">
                    <svg width="24" height="24" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.79211 5.89648H19.7921M1.79211 9.89648H19.7921M10.7921 5.89648V13.8965M3.79211 13.8965H17.7921C18.8967 13.8965 19.7921 13.0011 19.7921 11.8965V3.89648C19.7921 2.79191 18.8967 1.89648 17.7921 1.89648H3.79211C2.68754 1.89648 1.79211 2.79192 1.79211 3.89648V11.8965C1.79211 13.0011 2.68755 13.8965 3.79211 13.8965Z" stroke="#EFF0FF" stroke-width="2"/>
                    </svg>       
                    <span>Grades</span>
                </a>
            </div>
            <div class="px-5"> 
                <a href="/student-concerns" @click.prevent="active = 'Submit Concern'" :class="{'bg-blue-hover': active === 'Submit Concern'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold  flex items-center space-x-4">
                    <svg width="24" height="24" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.79211 7.89648H6.80211M10.7921 7.89648H10.8021M14.7921 7.89648H14.8021M7.79211 13.8965H3.79211C2.68754 13.8965 1.79211 13.0011 1.79211 11.8965V3.89648C1.79211 2.79192 2.68754 1.89648 3.79211 1.89648H17.7921C18.8967 1.89648 19.7921 2.79191 19.7921 3.89648V11.8965C19.7921 13.0011 18.8967 13.8965 17.7921 13.8965H12.7921L7.79211 18.8965V13.8965Z" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                  
                    <span>Submit Concern</span>
                </a>
            </div>
            <div class="px-5"> 
                <a href="/student-inbox" @click.prevent="active = 'Appeals Inbox'" :class="{'bg-blue-hover': active === 'Appeals Inbox'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold  flex items-center space-x-4">                     
                    <svg width="24" height="24" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.79211 16.8961V7.96647C1.79211 7.29777 2.12632 6.6733 2.68271 6.30237L9.68271 1.6357C10.3545 1.18784 11.2297 1.18784 11.9015 1.6357L18.9015 6.30237C19.4579 6.6733 19.7921 7.29777 19.7921 7.96647V16.8961M1.79211 16.8961C1.79211 18.0007 2.68754 18.8961 3.79211 18.8961H17.7921C18.8967 18.8961 19.7921 18.0007 19.7921 16.8961M1.79211 16.8961L8.54211 12.3961M19.7921 16.8961L13.0421 12.3961M1.79211 7.8961L8.54211 12.3961M19.7921 7.8961L13.0421 12.3961M13.0421 12.3961L11.9015 13.1565C11.2297 13.6044 10.3545 13.6044 9.68271 13.1565L8.54211 12.3961" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>                        
                    <span>Appeals Inbox</span>
                </a>
            </div>
            <div class="px-5"> 
                <a href="/student-services" @click.prevent="active = 'Student Services'" :class="{'bg-blue-hover': active === 'Student Services'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold flex items-center space-x-4">
                    <svg width="24" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.7921 7.89648V10.8965M16.7921 10.8965V13.8965M16.7921 10.8965H19.7921M16.7921 10.8965H13.7921M11.7921 5.89648C11.7921 8.10562 10.0013 9.89648 7.79211 9.89648C5.58298 9.89648 3.79211 8.10562 3.79211 5.89648C3.79211 3.68735 5.58298 1.89648 7.79211 1.89648C10.0013 1.89648 11.7921 3.68735 11.7921 5.89648ZM1.79211 18.8965C1.79211 15.5828 4.47841 12.8965 7.79211 12.8965C11.1058 12.8965 13.7921 15.5828 13.7921 18.8965V19.8965H1.79211V18.8965Z" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <span>Student Services</span>
                </a>
            </div>
        </nav>
    </div>
    <div class="px-5 mb-4">
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-hover flex items-center space-x-4 text-white-10">
            <svg width="24" height="24" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.79211 13.8965L5.79211 9.89648M5.79211 9.89648L9.79211 5.89648M5.79211 9.89648L19.7921 9.89648M14.7921 13.8965V14.8965C14.7921 16.5533 13.449 17.8965 11.7921 17.8965H4.79211C3.13526 17.8965 1.79211 16.5533 1.79211 14.8965V4.89648C1.79211 3.23963 3.13526 1.89648 4.79211 1.89648H11.7921C13.449 1.89648 14.7921 3.23963 14.7921 4.89648V5.89648" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                
            <span>Log out</span>
        </a>
    </div>
</div>
