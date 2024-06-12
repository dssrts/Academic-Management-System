<div class="w-64 bg-blue text-white flex flex-col justify-between" x-data="{ active: '{{ $activePage }}' }">
    <div>
        <nav class="mt-8 space-y-2">
            <!-- Navigation items with functional links and dynamic active state handling -->
            <div class="px-5"> 
                <a href="/student-information" @click="active = 'Information'" :class="{'bg-blue-hover': active === 'Information'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold-amber hover:font-bold flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
                    <span class = "text-[16px]"> Information</span>
                </a>
            </div>
            <div class="px-5">
                <a href="/student-evaluation" @click="active = 'Evaluation'" :class="{'bg-blue-hover': active === 'Evaluation'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold-amber hover:font-bold  flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                      </svg>                   
                    <span class = "text-[16px]"> Evaluation</span>
                </a>
            </div>
            <div class="px-5">
                <a href="/student-schedules" @click="active = 'Schedule'" :class="{'bg-blue-hover': active === 'Schedule'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold-amber hover:font-bold  flex items-center space-x-4">
                    <svg width="16" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.79211 5.89648V1.89648M14.7921 5.89648V1.89648M5.79211 9.89648H15.7921M3.79211 19.8965H17.7921C18.8967 19.8965 19.7921 19.0011 19.7921 17.8965V5.89648C19.7921 4.79191 18.8967 3.89648 17.7921 3.89648H3.79211C2.68754 3.89648 1.79211 4.79191 1.79211 5.89648V17.8965C1.79211 19.0011 2.68754 19.8965 3.79211 19.8965Z" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>   
                    <span class = "text-[16px]">Schedule</span>
                </a>
            </div>
            <div class="px-5 ">
                <a href="/student-grades" @click="active = 'Grades'" :class="{'bg-blue-hover': active === 'Grades'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold-amber hover:font-bold flex items-center space-x-4">
                    <svg width="16" height="16" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.79211 5.89648H19.7921M1.79211 9.89648H19.7921M10.7921 5.89648V13.8965M3.79211 13.8965H17.7921C18.8967 13.8965 19.7921 13.0011 19.7921 11.8965V3.89648C19.7921 2.79191 18.8967 1.89648 17.7921 1.89648H3.79211C2.68754 1.89648 1.79211 2.79192 1.79211 3.89648V11.8965C1.79211 13.0011 2.68755 13.8965 3.79211 13.8965Z" stroke="#EFF0FF" stroke-width="2"/>
                    </svg>       
                    <span class = "text-[16px]">Grades</span>
                </a>
            </div>
            <div class="px-5">
                <a href="/student-concerns" @click="active = 'Submit Concern'" :class="{'bg-blue-hover': active === 'Submit Concern'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold-amber hover:font-bold  flex items-center space-x-4">
                    <svg width="16" height="16" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.79211 7.89648H6.80211M10.7921 7.89648H10.8021M14.7921 7.89648H14.8021M7.79211 13.8965H3.79211C2.68754 13.8965 1.79211 13.0011 1.79211 11.8965V3.89648C1.79211 2.79192 2.68754 1.89648 3.79211 1.89648H17.7921C18.8967 1.89648 19.7921 2.79191 19.7921 3.89648V11.8965C19.7921 13.0011 18.8967 13.8965 17.7921 13.8965H12.7921L7.79211 18.8965V13.8965Z" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                  
                    <span class = "text-[16px]">Submit Concern</span>
                </a>
            </div>
            <div class="px-5">
                <a href="/student-inbox" @click="active = 'Appeals Inbox'" :class="{'bg-blue-hover': active === 'Appeals Inbox'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold-amber hover:font-bold  flex items-center space-x-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                      </svg>       
                    <span class = "text-[16px]">Appeals Inbox</span>
                </a>
            </div>
            <div class="px-5 ">
                <a href="/student-services" @click="active = 'Student Services'" :class="{'bg-blue-hover': active === 'Student Services'}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gold-amber hover:font-bold flex items-center space-x-4">
                    <svg width="16" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.7921 7.89648V10.8965M16.7921 10.8965V13.8965M16.7921 10.8965H19.7921M16.7921 10.8965H13.7921M11.7921 5.89648C11.7921 8.10562 10.0013 9.89648 7.79211 9.89648C5.58298 9.89648 3.79211 8.10562 3.79211 5.89648C3.79211 3.68735 5.58298 1.89648 7.79211 1.89648C10.0013 1.89648 11.7921 3.68735 11.7921 5.89648ZM1.79211 18.8965C1.79211 15.5828 4.47841 12.8965 7.79211 12.8965C11.1058 12.8965 13.7921 15.5828 13.7921 18.8965V19.8965H1.79211V18.8965Z" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <span class = "text-[16px]"> Student Services</span>
                </a>
            </div>
        </nav>
    </div>
    <div class="px-5 mb-4">
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-hover flex items-center space-x-4 text-white-10">
            <svg width="16" height="16" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.79211 13.8965L5.79211 9.89648M5.79211 9.89648L9.79211 5.89648M5.79211 9.89648L19.7921 9.89648M14.7921 13.8965V14.8965C14.7921 16.5533 13.449 17.8965 11.7921 17.8965H4.79211C3.13526 17.8965 1.79211 16.5533 1.79211 14.8965V4.89648C1.79211 3.23963 3.13526 1.89648 4.79211 1.89648H11.7921C13.449 1.89648 14.7921 3.23963 14.7921 4.89648V5.89648" stroke="#EFF0FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                
            <span class = "text-[16px]"> Log out</span>
        </a>
    </div>
</div>
