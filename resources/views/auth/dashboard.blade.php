<x-app-layout>


    <div class="pl-16"> <!-- Add left padding to make room for the sidebar -->
        <x-slot name="header">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
                <div class="flex items-center space-x-3">
                    <button id="calendar-btn" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </button>
                    <div class="relative">
                        <button id="notification-btn" class="relative text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-purple-500"></span>
                        </button>
                        <div id="notification-dropdown" class="absolute right-0 mt-2 w-72 sm:w-80 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-10 hidden">
                            <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                                <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100">Notifications</h3>
                            </div>
                            <div class="max-h-60 overflow-y-auto">
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Task deadline approaching</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Complete project proposal is due tomorrow</p>
                                </a>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">New task assigned</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">You have been assigned a new task</p>
                                </a>
                            </div>
                            <div class="px-4 py-2 border-t border-gray-200 dark:border-gray-700">
                                <a href="#" class="text-xs text-purple-600 dark:text-purple-400 hover:text-purple-500 dark:hover:text-purple-300">View all notifications</a>
                            </div>
                        </div>
                    </div>
                    <button 
                        id="theme-toggle"
                        class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                        onclick="toggleDarkMode()"
                    >
                        <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="relative">
                        <button id="user-menu-button" class="relative rounded-full bg-gray-200 dark:bg-gray-700 p-1 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </button>
                        <div id="user-dropdown" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-10 hidden">
                            <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Notifications</a>
                            <div class="border-t border-gray-200 dark:border-gray-700"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Welcome Card -->
                    <div class="col-span-1 md:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Welcome back, {{ Auth::user()->name }}</h3>
                            <p class="text-gray-500 dark:text-gray-400 mt-1">Here's an overview of your tasks and progress</p>
                            
                            <div class="mt-6 space-y-4">
                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm font-medium text-gray-700 dark:text-gray-300">Weekly Progress</div>
                                        <div id="progress-percentage" class="text-sm text-gray-500 dark:text-gray-400">0%</div>
                                    </div>
                                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                        <div id="progress-bar" class="bg-purple-600 h-2 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                        <div>
                                            <div id="completed-count" class="text-xl font-bold text-gray-900 dark:text-gray-100">0</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">Completed Tasks</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        <div>
                                            <div id="pending-count" class="text-xl font-bold text-gray-900 dark:text-gray-100">0</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">Pending Tasks</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                        </svg>
                                        <div>
                                            <div id="overdue-count" class="text-xl font-bold text-gray-900 dark:text-gray-100">0</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">Overdue Tasks</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <div>
                                            <div id="upcoming-count" class="text-xl font-bold text-gray-900 dark:text-gray-100">0</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">Upcoming Tasks</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Analytics Card -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex flex-row items-center justify-between pb-2">
                                <h3 class="text-md font-medium text-gray-900 dark:text-gray-100">Analytics</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="3" y1="9" x2="21" y2="9"></line>
                                    <line x1="9" y1="21" x2="9" y2="9"></line>
                                </svg>
                            </div>
                            <div class="space-y-4">
                                <div class="grid grid-cols-1 gap-2">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex items-center rounded-md bg-purple-100 dark:bg-purple-900/30 px-2 py-1 text-xs font-medium text-purple-700 dark:text-purple-300">Work</span>
                                            <span id="work-percentage" class="text-sm text-gray-700 dark:text-gray-300">0%</span>
                                        </div>
                                        <div class="w-[80px] bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                            <div id="work-progress" class="bg-purple-600 h-2 rounded-full" style="width: 0%"></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex items-center rounded-md bg-green-100 dark:bg-green-900/30 px-2 py-1 text-xs font-medium text-green-700 dark:text-green-300">Personal</span>
                                            <span id="personal-percentage" class="text-sm text-gray-700 dark:text-gray-300">0%</span>
                                        </div>
                                        <div class="w-[80px] bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                            <div id="personal-progress" class="bg-green-500 h-2 rounded-full" style="width: 0%"></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex items-center rounded-md bg-blue-100 dark:bg-blue-900/30 px-2 py-1 text-xs font-medium text-blue-700 dark:text-blue-300">Study</span>
                                            <span id="study-percentage" class="text-sm text-gray-700 dark:text-gray-300">0%</span>
                                        </div>
                                        <div class="w-[80px] bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                            <div id="study-progress" class="bg-blue-500 h-2 rounded-full" style="width: 0%"></div>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex items-center rounded-md bg-amber-100 dark:bg-amber-900/30 px-2 py-1 text-xs font-medium text-amber-700 dark:text-amber-300">Other</span>
                                            <span id="other-percentage" class="text-sm text-gray-700 dark:text-gray-300">0%</span>
                                        </div>
                                        <div class="w-[80px] bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                            <div id="other-progress" class="bg-amber-500 h-2 rounded-full" style="width: 0%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Task Manager -->
                <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Task Manager</h3>
                        
                        
                        <!-- Task Categories Tabs -->
                        <div class="border-b border-gray-200 dark:border-gray-700 mt-4 overflow-x-auto">
                            <nav class="-mb-px flex space-x-4 sm:space-x-8" aria-label="Tabs">
                                <button data-category="all" class="category-tab border-purple-500 text-purple-600 dark:text-purple-400 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                                    All Tasks
                                </button>
                                <button data-category="work" class="category-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 dark:hover:border-gray-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                    Work
                                </button>
                                <button data-category="personal" class="category-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 dark:hover:border-gray-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                    Personal
                                </button>
                                <button data-category="study" class="category-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 dark:hover:border-gray-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                    Study
                                </button>
                                <button data-category="other" class="category-tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300 dark:hover:border-gray-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                    Other
                                </button>
                            </nav>
                        </div>
                        
                        <!-- Add Task Form -->
                        <div class="mt-4 flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-2">
                            <input type="text" id="new-task" placeholder="Add a new task..." class="w-full sm:flex-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                            <div class="flex w-full sm:w-auto space-x-2">
                                <select id="task-category" class="flex-1 sm:w-auto rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                                    <option value="work">Work</option>
                                    <option value="personal">Personal</option>
                                    <option value="study">Study</option>
                                    <option value="other">Other</option>
                                </select>
                                <input type="date" id="task-due-date" class="flex-1 sm:w-auto rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                                <button type="button" id="add-task-btn" class="inline-flex items-center justify-center rounded-md bg-purple-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Task List -->
                        <div class="mt-4 space-y-2" id="task-list">
                            <!-- Tasks will be dynamically added here -->
                        </div>

                        <!-- Edit Task Modal -->
                        <div id="edit-task-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden px-4 sm:px-0">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6 w-full max-w-md mx-auto">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Edit Task</h3>
                                <div class="space-y-4">
                                    <div>
                                        <label for="edit-task-title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Task Title</label>
                                        <input type="text" id="edit-task-title" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                                    </div>
                                    <div>
                                        <label for="edit-task-category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                                        <select id="edit-task-category" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                                            <option value="work">Work</option>
                                            <option value="personal">Personal</option>
                                            <option value="study">Study</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="edit-task-due-date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Due Date</label>
                                        <input type="date" id="edit-task-due-date" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-purple-500 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                                    </div>
                                    <div class="flex justify-end space-x-2">
                                        <button id="cancel-edit-btn" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</button>
                                        <button id="save-edit-btn" class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-500">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Task Management and Dark Mode -->
    <script>
        // Task type definition
        class Task {
            constructor(id, title, completed, category, dueDate) {
                this.id = id;
                this.title = title;
                this.completed = completed;
                this.category = category;
                this.dueDate = dueDate;
            }
        }

        // Initial tasks data
        const initialTasks = [
            new Task("1", "Complete project proposal", false, "work", "2023-12-15"),
            new Task("2", "Review team presentation", true, "work", "2023-12-10"),
            new Task("3", "Grocery shopping", false, "personal", "2023-12-12"),
            new Task("4", "Study for exam", false, "study", "2023-12-20"),
            new Task("5", "Gym workout", true, "personal", "2023-12-11"),
            new Task("6", "Read chapter 5", false, "study", "2023-12-14"),
        ];

        // Global variables
        let tasks = [];
        let currentFilter = 'all';
        let editingTaskId = null;

        // DOM Elements
        const taskList = document.getElementById('task-list');
        const newTaskInput = document.getElementById('new-task');
        const taskCategorySelect = document.getElementById('task-category');
        const taskDueDateInput = document.getElementById('task-due-date');
        const addTaskBtn = document.getElementById('add-task-btn');
        const categoryTabs = document.querySelectorAll('.category-tab');
        const editTaskModal = document.getElementById('edit-task-modal');
        const editTaskTitle = document.getElementById('edit-task-title');
        const editTaskCategory = document.getElementById('edit-task-category');
        const editTaskDueDate = document.getElementById('edit-task-due-date');
        const saveEditBtn = document.getElementById('save-edit-btn');
        const cancelEditBtn = document.getElementById('cancel-edit-btn');
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        const notificationBtn = document.getElementById('notification-btn');
        const notificationDropdown = document.getElementById('notification-dropdown');

        // Initialize dark mode
        function initDarkMode() {
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

            // Change the icons inside the button based on previous settings
            if (localStorage.getItem('color-theme') === 'dark' || 
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
                document.documentElement.classList.add('dark');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
                document.documentElement.classList.remove('dark');
            }
        }

        // Toggle dark mode
        function toggleDarkMode() {
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

            // Toggle icons
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // If dark mode is currently active
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

        // Load tasks from localStorage or use initial tasks
        function loadTasks() {
            const savedTasks = localStorage.getItem('tasks');
            if (savedTasks) {
                tasks = JSON.parse(savedTasks);
            } else {
                tasks = initialTasks;
                saveTasks();
            }
            renderTasks();
            updateDashboardStats();
        }

        // Save tasks to localStorage
        function saveTasks() {
            localStorage.setItem('tasks', JSON.stringify(tasks));
            updateDashboardStats();
        }

        // Render tasks based on current filter
        function renderTasks() {
            taskList.innerHTML = '';
            
            const filteredTasks = currentFilter === 'all' 
                ? tasks 
                : tasks.filter(task => task.category === currentFilter);
            
            if (filteredTasks.length === 0) {
                taskList.innerHTML = `
                    <div class="text-center py-4 text-gray-500 dark:text-gray-400">
                        No tasks found. Add a new task to get started!
                    </div>
                `;
                return;
            }
            
            filteredTasks.forEach(task => {
                const taskElement = createTaskElement(task);
                taskList.appendChild(taskElement);
            });
        }

        // Create task element
        function createTaskElement(task) {
            const taskDiv = document.createElement('div');
            taskDiv.className = `flex items-center justify-between p-3 rounded-lg border border-gray-200 dark:border-gray-700 ${
                task.completed ? 'bg-gray-50 dark:bg-gray-800/50' : 'bg-white dark:bg-gray-800'
            }`;
            taskDiv.dataset.id = task.id;
            
            const categoryClasses = {
                'work': 'bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300',
                'personal': 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300',
                'study': 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300',
                'other': 'bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300'
            };
            
            taskDiv.innerHTML = `
    <div class="flex flex-col sm:flex-row sm:items-center w-full">
        <div class="flex items-center space-x-3 flex-1">
            <input type="checkbox" ${task.completed ? 'checked' : ''} class="rounded border-gray-300 text-purple-600 focus:ring-purple-500 dark:border-gray-600 dark:bg-gray-900">
            <label class="flex-1 cursor-pointer ${
                task.completed ? 'line-through text-gray-500 dark:text-gray-400' : 'text-gray-900 dark:text-gray-100'
            }">
                ${task.title}
            </label>
        </div>
        <div class="flex items-center justify-between sm:justify-end mt-2 sm:mt-0 space-x-2 sm:space-x-3 ml-8 sm:ml-0">
            <span class="inline-flex items-center rounded-md ${categoryClasses[task.category]} px-2 py-1 text-xs font-medium">
                ${task.category}
            </span>
            <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                ${task.dueDate}
            </div>
            <div class="flex items-center space-x-1">
                <button class="edit-task-btn text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                </button>
                <button class="delete-task-btn text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
`;
            
            // Add event listeners
            const checkbox = taskDiv.querySelector('input[type="checkbox"]');
            checkbox.addEventListener('change', function() {
                toggleTaskCompletion(task.id);
            });
            
            const editBtn = taskDiv.querySelector('.edit-task-btn');
            editBtn.addEventListener('click', function() {
                openEditModal(task.id);
            });
            
            const deleteBtn = taskDiv.querySelector('.delete-task-btn');
            deleteBtn.addEventListener('click', function() {
                deleteTask(task.id);
            });
            
            return taskDiv;
        }

        // Add a new task
        function addTask() {
            const title = newTaskInput.value.trim();
            const category = taskCategorySelect.value;
            let dueDate = taskDueDateInput.value;
            
            if (title === '') return;
            
            // If no due date is selected, set it to one week from now
            if (!dueDate) {
                const today = new Date();
                const nextWeek = new Date(today);
                nextWeek.setDate(today.getDate() + 7);
                dueDate = nextWeek.toISOString().split('T')[0];
            }
            
            const newTask = new Task(
                Date.now().toString(),
                title,
                false,
                category,
                dueDate
            );
            
            tasks.unshift(newTask);
            saveTasks();
            renderTasks();
            
            // Clear input fields
            newTaskInput.value = '';
            taskDueDateInput.value = '';
        }

        // Toggle task completion
        function toggleTaskCompletion(id) {
            tasks = tasks.map(task => {
                if (task.id === id) {
                    return { ...task, completed: !task.completed };
                }
                return task;
            });
            
            saveTasks();
            renderTasks();
        }

        // Delete a task
        function deleteTask(id) {
            tasks = tasks.filter(task => task.id !== id);
            saveTasks();
            renderTasks();
        }

        // Open edit modal
        function openEditModal(id) {
            const task = tasks.find(task => task.id === id);
            if (!task) return;
            
            editingTaskId = id;
            editTaskTitle.value = task.title;
            editTaskCategory.value = task.category;
            editTaskDueDate.value = task.dueDate;
            
            editTaskModal.classList.remove('hidden');
        }

        // Close edit modal
        function closeEditModal() {
            editTaskModal.classList.add('hidden');
            editingTaskId = null;
        }

        // Save edited task
        function saveEditedTask() {
            if (!editingTaskId) return;
            
            const title = editTaskTitle.value.trim();
            const category = editTaskCategory.value;
            const dueDate = editTaskDueDate.value;
            
            if (title === '') return;
            
            tasks = tasks.map(task => {
                if (task.id === editingTaskId) {
                    return {
                        ...task,
                        title,
                        category,
                        dueDate
                    };
                }
                return task;
            });
            
            saveTasks();
            renderTasks();
            closeEditModal();
        }

        // Update dashboard statistics
        function updateDashboardStats() {
            // Count tasks by status
            const completed = tasks.filter(task => task.completed).length;
            const pending = tasks.filter(task => !task.completed).length;
            
            // Count overdue and upcoming tasks
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            const overdue = tasks.filter(task => {
                const dueDate = new Date(task.dueDate);
                return !task.completed && dueDate < today;
            }).length;
            
            const upcoming = tasks.filter(task => {
                const dueDate = new Date(task.dueDate);
                const nextWeek = new Date(today);
                nextWeek.setDate(today.getDate() + 7);
                return !task.completed && dueDate >= today && dueDate <= nextWeek;
            }).length;
            
            // Update counters
            document.getElementById('completed-count').textContent = completed;
            document.getElementById('pending-count').textContent = pending;
            document.getElementById('overdue-count').textContent = overdue;
            document.getElementById('upcoming-count').textContent = upcoming;
            
            // Calculate progress percentage
            const total = tasks.length;
            const progressPercentage = total > 0 ? Math.round((completed / total) * 100) : 0;
            
            document.getElementById('progress-percentage').textContent = `${progressPercentage}%`;
            document.getElementById('progress-bar').style.width = `${progressPercentage}%`;
            
            // Calculate category percentages
            const categories = ['work', 'personal', 'study', 'other'];
            categories.forEach(category => {
                const count = tasks.filter(task => task.category === category).length;
                const percentage = total > 0 ? Math.round((count / total) * 100) : 0;
                
                document.getElementById(`${category}-percentage`).textContent = `${percentage}%`;
                document.getElementById(`${category}-progress`).style.width = `${percentage}%`;
            });
        }

        // Event Listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Add viewport meta tag for mobile responsiveness if not already present
            if (!document.querySelector('meta[name="viewport"]')) {
                const meta = document.createElement('meta');
                meta.name = 'viewport';
                meta.content = 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no';
                document.getElementsByTagName('head')[0].appendChild(meta);
            }
            // Initialize
            initDarkMode();
            
            // Set today's date as the default for the due date input
            const today = new Date();
            const nextWeek = new Date(today);
            nextWeek.setDate(today.getDate() + 7);
            taskDueDateInput.value = nextWeek.toISOString().split('T')[0];
            
            // Load tasks
            loadTasks();
            
            // Add task button
            addTaskBtn.addEventListener('click', addTask);
            
            // Add task on Enter key
            newTaskInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    addTask();
                }
            });
            
            // Category tabs
            categoryTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    categoryTabs.forEach(t => {
                        t.classList.remove('border-purple-500', 'text-purple-600', 'dark:text-purple-400');
                        t.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300', 'dark:text-gray-400', 'dark:hover:text-gray-300', 'dark:hover:border-gray-600');
                    });
                    
                    // Add active class to clicked tab
                    this.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300', 'dark:text-gray-400', 'dark:hover:text-gray-300', 'dark:hover:border-gray-600');
                    this.classList.add('border-purple-500', 'text-purple-600', 'dark:text-purple-400');
                    
                    // Update current filter
                    currentFilter = this.dataset.category;
                    renderTasks();
                });
            });
            
            // Edit modal buttons
            saveEditBtn.addEventListener('click', saveEditedTask);
            cancelEditBtn.addEventListener('click', closeEditModal);
            
            // User menu dropdown
            userMenuButton.addEventListener('click', function() {
                userDropdown.classList.toggle('hidden');
                // Close notification dropdown if open
                notificationDropdown.classList.add('hidden');
            });
            
            // Notification dropdown
            notificationBtn.addEventListener('click', function() {
                notificationDropdown.classList.toggle('hidden');
                // Close user dropdown if open
                userDropdown.classList.add('hidden');
            });
            
            // Calendar button
            document.getElementById('calendar-btn').addEventListener('click', function() {
                alert('Calendar functionality would open here');
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.add('hidden');
                }
                
                if (!notificationBtn.contains(event.target) && !notificationDropdown.contains(event.target)) {
                    notificationDropdown.classList.add('hidden');
                }
            });
            
            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === editTaskModal) {
                    closeEditModal();
                }
            });
        });
    </script>
</x-app-layout>

