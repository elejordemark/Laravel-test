<x-app-layout>
  <div class="fixed left-0 top-0 bottom-0 w-16 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 z-10 flex flex-col items-center py-4">
      <div class="relative group">
          <a href="{{ route('dashboard') }}" class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
          </a>
          <div class="absolute left-full ml-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 p-2 hidden group-hover:block z-50">
              <div class="text-sm text-gray-700 dark:text-gray-300">
                  Return to Dashboard
              </div>
          </div>
      </div>
  </div>

  <div class="pl-16"> <!-- Add left padding to make room for the sidebar -->
      <x-slot name="header">
          <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0">
              <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                  {{ __('Clockify') }}
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
              <!-- Time Tracker -->
              <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                  <div class="p-6">
                      <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Time Tracker</h3>
                      
                      <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-3 sm:space-y-0 sm:space-x-3">
                          <input type="text" id="time-entry-description" placeholder="What are you working on?" class="w-full sm:flex-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                          
                          <div class="flex w-full sm:w-auto space-x-2">
                              <select id="time-entry-project" class="rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                  <option value="">Select Project</option>
                                  <option value="project1">Project 1</option>
                                  <option value="project2">Project 2</option>
                                  <option value="project3">Project 3</option>
                              </select>
                              
                              <div class="relative">
                                  <input type="text" id="tag-search" placeholder="Search tags" class="rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 pl-8 w-32">
                                  <div class="absolute inset-y-0 left-0 pl-2 flex items-center pointer-events-none">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                      </svg>
                                  </div>
                                  <div id="tag-dropdown" class="absolute z-10 mt-1 w-full bg-white dark:bg-gray-800 shadow-lg rounded-md py-1 text-sm hidden">
                                      <div class="px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer" data-tag="development">Development</div>
                                      <div class="px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer" data-tag="design">Design</div>
                                      <div class="px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer" data-tag="meeting">Meeting</div>
                                      <div class="px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer" data-tag="research">Research</div>
                                      <div class="px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer" data-tag="planning">Planning</div>
                                      <div class="px-2 py-1 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer" data-tag="documentation">Documentation</div>
                                  </div>
                              </div>
                              
                              <button id="billable-toggle" class="flex items-center justify-center rounded-md border border-gray-300 dark:border-gray-600 px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700" data-billable="false">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <circle cx="12" cy="12" r="10"></circle>
                                      <line x1="12" y1="8" x2="12" y2="12"></line>
                                      <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                  </svg>
                                  Billable
                              </button>
                              
                              <div id="timer-display" class="flex items-center justify-center bg-gray-100 dark:bg-gray-700 rounded-md px-3 py-2 text-gray-900 dark:text-gray-100 font-mono">
                                  00:00:00
                              </div>
                              
                              <button id="start-timer-btn" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <circle cx="12" cy="12" r="10"></circle>
                                      <polygon points="10 8 16 12 10 16 10 8"></polygon>
                                  </svg>
                              </button>
                          </div>
                      </div>
                      
                      <!-- Selected Tags Display -->
                      <div id="selected-tags" class="flex flex-wrap gap-2 mt-3"></div>
                  </div>
              </div>
              
              <!-- Time Entries -->
              <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6">
                      <div class="flex justify-between items-center mb-4">
                          <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Time Entries</h3>
                          
                          <div class="flex space-x-2">
                              <select id="time-filter" class="rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                  <option value="today">Today</option>
                                  <option value="yesterday">Yesterday</option>
                                  <option value="this-week">This Week</option>
                                  <option value="last-week">Last Week</option>
                                  <option value="this-month">This Month</option>
                                  <option value="custom">Custom Range</option>
                              </select>
                              
                              <div id="date-range-picker" class="hidden flex space-x-2 items-center">
                                  <input type="date" id="date-from" class="rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                  <span class="text-gray-500 dark:text-gray-400">to</span>
                                  <input type="date" id="date-to" class="rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 text-sm">
                                  <button id="apply-date-range" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-1 text-sm font-semibold text-white shadow-sm hover:bg-blue-500">
                                      Apply
                                  </button>
                              </div>
                              
                              <button id="export-btn" class="inline-flex items-center justify-center rounded-md bg-gray-200 dark:bg-gray-700 px-3 py-2 text-sm font-medium text-gray-900 dark:text-gray-100 hover:bg-gray-300 dark:hover:bg-gray-600">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                      <polyline points="7 10 12 15 17 10"></polyline>
                                      <line x1="12" y1="15" x2="12" y2="3"></line>
                                  </svg>
                                  Export
                              </button>
                          </div>
                      </div>
                      
                      <div class="overflow-x-auto">
                          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                              <thead class="bg-gray-50 dark:bg-gray-700">
                                  <tr>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Project</th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tag</th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Start Time</th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">End Time</th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Duration</th>
                                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Billable</th>
                                      <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                  </tr>
                              </thead>
                              <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700" id="time-entries-list">
                                  <!-- Time entries will be dynamically added here -->
                              </tbody>
                          </table>
                      </div>
                      
                      <!-- Empty state for when there are no entries -->
                      <div id="empty-state" class="hidden text-center py-10">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-1">No time entries yet</h3>
                          <p class="text-gray-500 dark:text-gray-400">Start tracking your time by clicking the play button above.</p>
                      </div>
                      
                      <!-- Pagination -->
                      <div id="pagination" class="flex items-center justify-between mt-4">
                          <div class="flex-1 flex justify-between sm:hidden">
                              <button class="pagination-btn relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700" data-page="prev">
                                  Previous
                              </button>
                              <button class="pagination-btn ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700" data-page="next">
                                  Next
                              </button>
                          </div>
                          <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                              <div>
                                  <p class="text-sm text-gray-700 dark:text-gray-300">
                                      Showing <span id="page-start" class="font-medium">1</span> to <span id="page-end" class="font-medium">10</span> of <span id="total-entries" class="font-medium">0</span> results
                                  </p>
                              </div>
                              <div>
                                  <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination" id="pagination-numbers">
                                      <!-- Pagination numbers will be dynamically added here -->
                                  </nav>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <!-- Weekly Summary -->
              <div class="mt-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6">
                      <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Weekly Summary</h3>
                      
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                          <!-- Weekly Hours Chart -->
                          <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                              <div class="flex justify-between items-center mb-4">
                                  <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">Hours per Day</h4>
                                  <div class="text-sm text-gray-500 dark:text-gray-400">
                                      Total: <span id="weekly-total-hours" class="font-medium">0h 0m</span>
                                  </div>
                              </div>
                              <div class="h-64 flex items-end space-x-2" id="weekly-chart">
                                  <!-- Chart bars will be dynamically generated -->
                              </div>
                          </div>
                          
                          <!-- Project Distribution -->
                          <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                              <div class="flex justify-between items-center mb-4">
                                  <h4 class="text-md font-medium text-gray-900 dark:text-gray-100">Project Distribution</h4>
                                  <select id="project-chart-period" class="text-xs rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                      <option value="week">This Week</option>
                                      <option value="month">This Month</option>
                                      <option value="year">This Year</option>
                                  </select>
                              </div>
                              <div class="space-y-4" id="project-distribution">
                                  <!-- Project distribution bars will be dynamically generated -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              
              <!-- Edit Time Entry Modal -->
              <div id="edit-entry-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md mx-auto">
                      <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Edit Time Entry</h3>
                      <div class="space-y-4">
                          <div>
                              <label for="edit-description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                              <input type="text" id="edit-description" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                          </div>
                          <div>
                              <label for="edit-project" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Project</label>
                              <select id="edit-project" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                  <option value="">Select Project</option>
                                  <option value="project1">Project 1</option>
                                  <option value="project2">Project 2</option>
                                  <option value="project3">Project 3</option>
                              </select>
                          </div>
                          <div>
                              <label for="edit-tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tags</label>
                              <input type="text" id="edit-tags" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" placeholder="Comma-separated tags">
                          </div>
                          <div class="grid grid-cols-2 gap-4">
                              <div>
                                  <label for="edit-start-time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Start Time</label>
                                  <input type="time" id="edit-start-time" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                              </div>
                              <div>
                                  <label for="edit-end-time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">End Time</label>
                                  <input type="time" id="edit-end-time" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                              </div>
                          </div>
                          <div class="flex items-center">
                              <input type="checkbox" id="edit-billable" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-900">
                              <label for="edit-billable" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Billable</label>
                          </div>
                          <div class="flex justify-end space-x-2">
                              <button id="cancel-edit" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</button>
                              <button id="save-edit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">Save</button>
                          </div>
                      </div>
                  </div>
              </div>
              
              <!-- Delete Confirmation Modal -->
              <div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md mx-auto">
                      <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Delete Time Entry</h3>
                      <p class="text-gray-500 dark:text-gray-400 mb-4">Are you sure you want to delete this time entry? This action cannot be undone.</p>
                      <div class="flex justify-end space-x-2">
                          <button id="cancel-delete" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</button>
                          <button id="confirm-delete" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500">Delete</button>
                      </div>
                  </div>
              </div>
              
              <!-- Export Modal -->
              <div id="export-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md mx-auto">
                      <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Export Time Entries</h3>
                      <div class="space-y-4">
                          <div>
                              <label for="export-format" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Format</label>
                              <select id="export-format" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                  <option value="csv">CSV</option>
                                  <option value="excel">Excel</option>
                                  <option value="pdf">PDF</option>
                              </select>
                          </div>
                          <div>
                              <label for="export-date-range" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date Range</label>
                              <select id="export-date-range" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                                  <option value="today">Today</option>
                                  <option value="yesterday">Yesterday</option>
                                  <option value="this-week">This Week</option>
                                  <option value="last-week">Last Week</option>
                                  <option value="this-month">This Month</option>
                                  <option value="custom">Custom Range</option>
                              </select>
                          </div>
                          <div id="export-custom-range" class="hidden space-y-2">
                              <div>
                                  <label for="export-date-from" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">From</label>
                                  <input type="date" id="export-date-from" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                              </div>
                              <div>
                                  <label for="export-date-to" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">To</label>
                                  <input type="date" id="export-date-to" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                              </div>
                          </div>
                          <div class="flex justify-end space-x-2">
                              <button id="cancel-export" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">Cancel</button>
                              <button id="confirm-export" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">Export</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- JavaScript for Time Tracking -->
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Initialize dark mode
          initDarkMode();
          
          // DOM Elements
          const startTimerBtn = document.getElementById('start-timer-btn');
          const timerDisplay = document.getElementById('timer-display');
          const timeEntryDescription = document.getElementById('time-entry-description');
          const timeEntryProject = document.getElementById('time-entry-project');
          const tagSearch = document.getElementById('tag-search');
          const tagDropdown = document.getElementById('tag-dropdown');
          const selectedTagsContainer = document.getElementById('selected-tags');
          const billableToggle = document.getElementById('billable-toggle');
          const timeEntriesList = document.getElementById('time-entries-list');
          const emptyState = document.getElementById('empty-state');
          const timeFilter = document.getElementById('time-filter');
          const dateRangePicker = document.getElementById('date-range-picker');
          const dateFrom = document.getElementById('date-from');
          const dateTo = document.getElementById('date-to');
          const applyDateRange = document.getElementById('apply-date-range');
          const exportBtn = document.getElementById('export-btn');
          const userMenuButton = document.getElementById('user-menu-button');
          const userDropdown = document.getElementById('user-dropdown');
          const calendarBtn = document.getElementById('calendar-btn');
          const editEntryModal = document.getElementById('edit-entry-modal');
          const deleteModal = document.getElementById('delete-modal');
          const exportModal = document.getElementById('export-modal');
          const weeklyChart = document.getElementById('weekly-chart');
          const projectDistribution = document.getElementById('project-distribution');
          const projectChartPeriod = document.getElementById('project-chart-period');
          const weeklyTotalHours = document.getElementById('weekly-total-hours');
          const paginationNumbers = document.getElementById('pagination-numbers');
          const pageStart = document.getElementById('page-start');
          const pageEnd = document.getElementById('page-end');
          const totalEntries = document.getElementById('total-entries');
          
          // Timer variables
          let timerRunning = false;
          let timerInterval;
          let startTime;
          let elapsedTime = 0;
          
          // Time entries array
          let timeEntries = [];
          
          // Selected tags array
          let selectedTags = [];
          
          // Current page for pagination
          let currentPage = 1;
          const entriesPerPage = 10;
          
          // Currently editing entry ID
          let editingEntryId = null;
          let deletingEntryId = null;
          
          // Initialize with sample data
          initializeSampleData();
          
          // Initialize UI
          updateUI();
          
          // Billable toggle
          billableToggle.addEventListener('click', function() {
              const isBillable = billableToggle.getAttribute('data-billable') === 'true';
              billableToggle.setAttribute('data-billable', !isBillable);
              
              if (!isBillable) {
                  billableToggle.classList.add('bg-blue-100', 'dark:bg-blue-900/30', 'text-blue-700', 'dark:text-blue-300', 'border-blue-300', 'dark:border-blue-700');
                  billableToggle.classList.remove('border-gray-300', 'dark:border-gray-600', 'text-gray-700', 'dark:text-gray-300');
              } else {
                  billableToggle.classList.remove('bg-blue-100', 'dark:bg-blue-900/30', 'text-blue-700', 'dark:text-blue-300', 'border-blue-300', 'dark:border-blue-700');
                  billableToggle.classList.add('border-gray-300', 'dark:border-gray-600', 'text-gray-700', 'dark:text-gray-300');
              }
          });
          
          // Tag search
          tagSearch.addEventListener('focus', function() {
              tagDropdown.classList.remove('hidden');
          });
          
          tagSearch.addEventListener('input', function() {
              const searchTerm = tagSearch.value.toLowerCase();
              const tagOptions = tagDropdown.querySelectorAll('div');
              
              tagOptions.forEach(option => {
                  const tag = option.getAttribute('data-tag');
                  if (tag.includes(searchTerm)) {
                      option.classList.remove('hidden');
                  } else {
                      option.classList.add('hidden');
                  }
              });
              
              tagDropdown.classList.remove('hidden');
          });
          
          document.addEventListener('click', function(event) {
              if (!tagSearch.contains(event.target) && !tagDropdown.contains(event.target)) {
                  tagDropdown.classList.add('hidden');
              }
          });
          
          // Tag selection
          tagDropdown.querySelectorAll('div').forEach(option => {
              option.addEventListener('click', function() {
                  const tag = this.getAttribute('data-tag');
                  if (!selectedTags.includes(tag)) {
                      selectedTags.push(tag);
                      renderSelectedTags();
                  }
                  tagSearch.value = '';
                  tagDropdown.classList.add('hidden');
              });
          });
          
          // Start/Stop Timer
          startTimerBtn.addEventListener('click', function() {
              if (!timerRunning) {
                  // Start timer
                  startTime = Date.now() - elapsedTime;
                  timerInterval = setInterval(updateTimer, 1000);
                  timerRunning = true;
                  
                  // Change button to stop
                  startTimerBtn.innerHTML = `
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <rect x="6" y="6" width="12" height="12"></rect>
                      </svg>
                  `;
                  startTimerBtn.classList.remove('bg-blue-600', 'hover:bg-blue-500');
                  startTimerBtn.classList.add('bg-red-600', 'hover:bg-red-500');
              } else {
                  // Stop timer
                  clearInterval(timerInterval);
                  
                  // Add time entry if description is not empty
                  if (timeEntryDescription.value.trim() !== '') {
                      addTimeEntry();
                  }
                  
                  // Reset timer
                  elapsedTime = 0;
                  timerDisplay.textContent = '00:00:00';
                  timerRunning = false;
                  
                  // Reset form
                  timeEntryDescription.value = '';
                  selectedTags = [];
                  renderSelectedTags();
                  billableToggle.setAttribute('data-billable', 'false');
                  billableToggle.classList.remove('bg-blue-100', 'dark:bg-blue-900/30', 'text-blue-700', 'dark:text-blue-300', 'border-blue-300', 'dark:border-blue-700');
                  billableToggle.classList.add('border-gray-300', 'dark:border-gray-600', 'text-gray-700', 'dark:text-gray-300');
                  
                  // Change button back to start
                  startTimerBtn.innerHTML = `
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <circle cx="12" cy="12" r="10"></circle>
                          <polygon points="10 8 16 12 10 16 10 8"></polygon>
                      </svg>
                  `;
                  startTimerBtn.classList.remove('bg-red-600', 'hover:bg-red-500');
                  startTimerBtn.classList.add('bg-blue-600', 'hover:bg-blue-500');
              }
          });
          
          // Time filter change
          timeFilter.addEventListener('change', function() {
              if (timeFilter.value === 'custom') {
                  dateRangePicker.classList.remove('hidden');
              } else {
                  dateRangePicker.classList.add('hidden');
                  filterTimeEntries(timeFilter.value);
              }
          });
          
          // Apply custom date range
          applyDateRange.addEventListener('click', function() {
              if (dateFrom.value && dateTo.value) {
                  filterTimeEntries('custom', dateFrom.value, dateTo.value);
              }
          });
          
          // Export button
          exportBtn.addEventListener('click', function() {
              exportModal.classList.remove('hidden');
          });
          
          // Export date range change
          document.getElementById('export-date-range').addEventListener('change', function() {
              if (this.value === 'custom') {
                  document.getElementById('export-custom-range').classList.remove('hidden');
              } else {
                  document.getElementById('export-custom-range').classList.add('hidden');
              }
          });
          
          // Export modal buttons
          document.getElementById('cancel-export').addEventListener('click', function() {
              exportModal.classList.add('hidden');
          });
          
          document.getElementById('confirm-export').addEventListener('click', function() {
              const format = document.getElementById('export-format').value;
              const dateRange = document.getElementById('export-date-range').value;
              
              // Simulate export
              alert(`Exporting time entries as ${format.toUpperCase()} for ${dateRange}`);
              exportModal.classList.add('hidden');
          });
          
          // Calendar button
          calendarBtn.addEventListener('click', function() {
              alert('Calendar view would open here');
          });
          
          // User menu dropdown
          userMenuButton.addEventListener('click', function() {
              userDropdown.classList.toggle('hidden');
          });
          
          // Project chart period change
          projectChartPeriod.addEventListener('change', function() {
              updateProjectDistribution();
          });
          
          // Edit modal buttons
          document.getElementById('cancel-edit').addEventListener('click', function() {
              editEntryModal.classList.add('hidden');
          });
          
          document.getElementById('save-edit').addEventListener('click', function() {
              saveEditedEntry();
          });
          
          // Delete modal buttons
          document.getElementById('cancel-delete').addEventListener('click', function() {
              deleteModal.classList.add('hidden');
          });
          
          document.getElementById('confirm-delete').addEventListener('click', function() {
              if (deletingEntryId !== null) {
                  deleteTimeEntry(deletingEntryId);
                  deleteModal.classList.add('hidden');
              }
          });
          
          // Close dropdowns and modals when clicking outside
          document.addEventListener('click', function(event) {
              if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                  userDropdown.classList.add('hidden');
              }
              
              if (event.target === editEntryModal) {
                  editEntryModal.classList.add('hidden');
              }
              
              if (event.target === deleteModal) {
                  deleteModal.classList.add('hidden');
              }
              
              if (event.target === exportModal) {
                  exportModal.classList.add('hidden');
              }
          });
          
          // Update timer display
          function updateTimer() {
              elapsedTime = Date.now() - startTime;
              timerDisplay.textContent = formatTime(elapsedTime);
          }
          
          // Format time as HH:MM:SS
          function formatTime(time) {
              let seconds = Math.floor(time / 1000);
              let minutes = Math.floor(seconds / 60);
              let hours = Math.floor(minutes / 60);
              
              seconds = seconds % 60;
              minutes = minutes % 60;
              
              return `${padZero(hours)}:${padZero(minutes)}:${padZero(seconds)}`;
          }
          
          // Format duration as Xh Ym
          function formatDuration(milliseconds) {
              const hours = Math.floor(milliseconds / (1000 * 60 * 60));
              const minutes = Math.floor((milliseconds % (1000 * 60 * 60)) / (1000 * 60));
              return `${hours}h ${minutes}m`;
          }
          
          // Add leading zero to numbers less than 10
          function padZero(num) {
              return num < 10 ? `0${num}` : num;
          }
          
          // Render selected tags
          function renderSelectedTags() {
              selectedTagsContainer.innerHTML = '';
              
              selectedTags.forEach(tag => {
                  const tagElement = document.createElement('div');
                  tagElement.className = 'inline-flex items-center rounded-md bg-blue-100 dark:bg-blue-900/30 px-2 py-1 text-xs font-medium text-blue-700 dark:text-blue-300';
                  tagElement.innerHTML = `
                      ${tag}
                      <button class="ml-1 text-blue-700 dark:text-blue-300 hover:text-blue-900 dark:hover:text-blue-100" data-tag="${tag}">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                      </button>
                  `;
                  
                  selectedTagsContainer.appendChild(tagElement);
                  
                  // Add event listener to remove tag
                  tagElement.querySelector('button').addEventListener('click', function() {
                      const tagToRemove = this.getAttribute('data-tag');
                      selectedTags = selectedTags.filter(t => t !== tagToRemove);
                      renderSelectedTags();
                  });
              });
          }
          
          // Add time entry
          function addTimeEntry() {
              const description = timeEntryDescription.value.trim();
              const project = timeEntryProject.value;
              const tags = [...selectedTags];
              const isBillable = billableToggle.getAttribute('data-billable') === 'true';
              
              // Get current time
              const now = new Date();
              const endTime = now.toTimeString().slice(0, 5);
              
              // Calculate start time
              const startDate = new Date(now.getTime() - elapsedTime);
              const startTime = startDate.toTimeString().slice(0, 5);
              
              // Create new time entry
              const newEntry = {
                  id: Date.now().toString(),
                  description,
                  project,
                  tags,
                  startTime,
                  endTime,
                  duration: elapsedTime,
                  date: now.toISOString().split('T')[0],
                  billable: isBillable
              };
              
              // Add to time entries array
              timeEntries.unshift(newEntry);
              
              // Update UI
              updateUI();
              
              // Save to localStorage
              saveTimeEntries();
          }
          
          // Edit time entry
          function editTimeEntry(id) {
              const entry = timeEntries.find(entry => entry.id === id);
              if (!entry) return;
              
              editingEntryId = id;
              
              // Populate edit form
              document.getElementById('edit-description').value = entry.description;
              document.getElementById('edit-project').value = entry.project;
              document.getElementById('edit-tags').value = entry.tags.join(', ');
              document.getElementById('edit-start-time').value = entry.startTime;
              document.getElementById('edit-end-time').value = entry.endTime;
              document.getElementById('edit-billable').checked = entry.billable;
              
              // Show edit modal
              editEntryModal.classList.remove('hidden');
          }
          
          // Save edited entry
          function saveEditedEntry() {
              if (editingEntryId === null) return;
              
              const description = document.getElementById('edit-description').value.trim();
              const project = document.getElementById('edit-project').value;
              const tagsString = document.getElementById('edit-tags').value;
              const tags = tagsString.split(',').map(tag => tag.trim()).filter(tag => tag !== '');
              const startTime = document.getElementById('edit-start-time').value;
              const endTime = document.getElementById('edit-end-time').value;
              const billable = document.getElementById('edit-billable').checked;
              
              // Calculate duration
              const startDate = new Date(`2000-01-01T${startTime}:00`);
              const endDate = new Date(`2000-01-01T${endTime}:00`);
              let duration = endDate - startDate;
              if (duration < 0) {
                  duration += 24 * 60 * 60 * 1000; // Add a day if end time is on the next day
              }
              
              // Update entry
              timeEntries = timeEntries.map(entry => {
                  if (entry.id === editingEntryId) {
                      return {
                          ...entry,
                          description,
                          project,
                          tags,
                          startTime,
                          endTime,
                          duration,
                          billable
                      };
                  }
                  return entry;
              });
              
              // Reset editing state
              editingEntryId = null;
              
              // Update UI
              updateUI();
              
              // Save to localStorage
              saveTimeEntries();
              
              // Hide modal
              editEntryModal.classList.add('hidden');
          }
          
          // Delete time entry
          function confirmDeleteTimeEntry(id) {
              deletingEntryId = id;
              deleteModal.classList.remove('hidden');
          }
          
          function deleteTimeEntry(id) {
              timeEntries = timeEntries.filter(entry => entry.id !== id);
              
              // Update UI
              updateUI();
              
              // Save to localStorage
              saveTimeEntries();
          }
          
          // Filter time entries
          function filterTimeEntries(filter, fromDate = null, toDate = null) {
              const today = new Date();
              today.setHours(0, 0, 0, 0);
              
              const yesterday = new Date(today);
              yesterday.setDate(yesterday.getDate() - 1);
              
              const thisWeekStart = new Date(today);
              thisWeekStart.setDate(thisWeekStart.getDate() - thisWeekStart.getDay());
              
              const lastWeekStart = new Date(thisWeekStart);
              lastWeekStart.setDate(lastWeekStart.getDate() - 7);
              
              const lastWeekEnd = new Date(thisWeekStart);
              lastWeekEnd.setDate(lastWeekEnd.getDate() - 1);
              
              const thisMonthStart = new Date(today.getFullYear(), today.getMonth(), 1);
              
              let filteredEntries = [...timeEntries];
              
              switch (filter) {
                  case 'today':
                      filteredEntries = timeEntries.filter(entry => {
                          const entryDate = new Date(entry.date);
                          return entryDate.getTime() === today.getTime();
                      });
                      break;
                  case 'yesterday':
                      filteredEntries = timeEntries.filter(entry => {
                          const entryDate = new Date(entry.date);
                          return entryDate.getTime() === yesterday.getTime();
                      });
                      break;
                  case 'this-week':
                      filteredEntries = timeEntries.filter(entry => {
                          const entryDate = new Date(entry.date);
                          return entryDate >= thisWeekStart && entryDate <= today;
                      });
                      break;
                  case 'last-week':
                      filteredEntries = timeEntries.filter(entry => {
                          const entryDate = new Date(entry.date);
                          return entryDate >= lastWeekStart && entryDate <= lastWeekEnd;
                      });
                      break;
                  case 'this-month':
                      filteredEntries = timeEntries.filter(entry => {
                          const entryDate = new Date(entry.date);
                          return entryDate >= thisMonthStart && entryDate <= today;
                      });
                      break;
                  case 'custom':
                      if (fromDate && toDate) {
                          const from = new Date(fromDate);
                          const to = new Date(toDate);
                          to.setHours(23, 59, 59, 999); // End of day
                          
                          filteredEntries = timeEntries.filter(entry => {
                              const entryDate = new Date(entry.date);
                              return entryDate >= from && entryDate <= to;
                          });
                      }
                      break;
              }
              
              renderTimeEntries(filteredEntries);
              updatePagination(filteredEntries.length);
          }
          
          // Render time entries
          function renderTimeEntries(entries = timeEntries) {
              // Clear time entries list
              timeEntriesList.innerHTML = '';
              
              // Show empty state if no entries
              if (entries.length === 0) {
                  emptyState.classList.remove('hidden');
                  document.getElementById('pagination').classList.add('hidden');
                  return;
              }
              
              // Hide empty state
              emptyState.classList.add('hidden');
              document.getElementById('pagination').classList.remove('hidden');
              
              // Calculate pagination
              const startIndex = (currentPage - 1) * entriesPerPage;
              const endIndex = Math.min(startIndex + entriesPerPage, entries.length);
              const paginatedEntries = entries.slice(startIndex, endIndex);
              
              // Render paginated entries
              paginatedEntries.forEach(entry => {
                  const row = document.createElement('tr');
                  
                  // Get tag class based on tag value
                  let tagHtml = '';
                  if (entry.tags.length > 0) {
                      entry.tags.forEach(tag => {
                          let tagClass = '';
                          switch(tag) {
                              case 'development':
                                  tagClass = 'bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200';
                                  break;
                              case 'design':
                                  tagClass = 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200';
                                  break;
                              case 'meeting':
                                  tagClass = 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200';
                                  break;
                              case 'research':
                                  tagClass = 'bg-amber-100 dark:bg-amber-900 text-amber-800 dark:text-amber-200';
                                  break;
                              case 'planning':
                                  tagClass = 'bg-pink-100 dark:bg-pink-900 text-pink-800 dark:text-pink-200';
                                  break;
                              case 'documentation':
                                  tagClass = 'bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200';
                                  break;
                              default:
                                  tagClass = 'bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200';
                          }
                          tagHtml += `<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${tagClass} mr-1">${tag}</span>`;
                      });
                  } else {
                      tagHtml = '<span class="text-gray-500 dark:text-gray-400">-</span>';
                  }
                  
                  row.innerHTML = `
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">${entry.description}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">${entry.project || '-'}</td>
                      <td class="px-6 py-4 whitespace-nowrap">${tagHtml}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">${entry.startTime}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">${entry.endTime}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">${formatDuration(entry.duration)}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                          ${entry.billable ? 
                              '<span class="inline-flex items-center rounded-full bg-green-100 dark:bg-green-900/30 px-2 py-1 text-xs font-medium text-green-700 dark:text-green-300">Yes</span>' : 
                              '<span class="inline-flex items-center rounded-full bg-gray-100 dark:bg-gray-900/30 px-2 py-1 text-xs font-medium text-gray-700 dark:text-gray-300">No</span>'}
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <button class="edit-entry-btn text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 mr-2" data-id="${entry.id}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                              </svg>
                          </button>
                          <button class="delete-entry-btn text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300" data-id="${entry.id}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="3 6 5 6 21 6"></polyline>
                                  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                              </svg>
                          </button>
                      </td>
                  `;
                  
                  timeEntriesList.appendChild(row);
              });
              
              // Add event listeners to edit and delete buttons
              document.querySelectorAll('.edit-entry-btn').forEach(button => {
                  button.addEventListener('click', function() {
                      const id = this.getAttribute('data-id');
                      editTimeEntry(id);
                  });
              });
              
              document.querySelectorAll('.delete-entry-btn').forEach(button => {
                  button.addEventListener('click', function() {
                      const id = this.getAttribute('data-id');
                      confirmDeleteTimeEntry(id);
                  });
              });
          }
          
          // Update pagination
          function updatePagination(totalCount) {
              const totalPages = Math.ceil(totalCount / entriesPerPage);
              
              // Update page info
              pageStart.textContent = totalCount === 0 ? 0 : (currentPage - 1) * entriesPerPage + 1;
              pageEnd.textContent = Math.min(currentPage * entriesPerPage, totalCount);
              totalEntries.textContent = totalCount;
              
              // Generate pagination numbers
              paginationNumbers.innerHTML = '';
              
              // Previous button
              const prevButton = document.createElement('button');
              prevButton.className = 'relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700';
              prevButton.innerHTML = `
                  <span class="sr-only">Previous</span>
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg>
              `;
              prevButton.disabled = currentPage === 1;
              prevButton.addEventListener('click', function() {
                  if (currentPage > 1) {
                      currentPage--;
                      updateUI();
                  }
              });
              paginationNumbers.appendChild(prevButton);
              
              // Page numbers
              const maxPagesToShow = 5;
              let startPage = Math.max(1, currentPage - Math.floor(maxPagesToShow / 2));
              let endPage = Math.min(totalPages, startPage + maxPagesToShow - 1);
              
              if (endPage - startPage + 1 < maxPagesToShow) {
                  startPage = Math.max(1, endPage - maxPagesToShow + 1);
              }
              
              for (let i = startPage; i <= endPage; i++) {
                  const pageButton = document.createElement('button');
                  pageButton.className = i === currentPage
                      ? 'z-10 bg-blue-50 dark:bg-blue-900/30 border-blue-500 dark:border-blue-400 text-blue-600 dark:text-blue-400 relative inline-flex items-center px-4 py-2 border text-sm font-medium'
                      : 'bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700 relative inline-flex items-center px-4 py-2 border text-sm font-medium';
                  pageButton.textContent = i;
                  pageButton.addEventListener('click', function() {
                      currentPage = i;
                      updateUI();
                  });
                  paginationNumbers.appendChild(pageButton);
              }
              
              // Next button
              const nextButton = document.createElement('button');
              nextButton.className = 'relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700';
              nextButton.innerHTML = `
                  <span class="sr-only">Next</span>
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                  </svg>
              `;
              nextButton.disabled = currentPage === totalPages;
              nextButton.addEventListener('click', function() {
                  if (currentPage < totalPages) {
                      currentPage++;
                      updateUI();
                  }
              });
              paginationNumbers.appendChild(nextButton);
          }
          
          // Update weekly chart
          function updateWeeklyChart() {
              weeklyChart.innerHTML = '';
              
              // Get current week data
              const today = new Date();
              const dayOfWeek = today.getDay(); // 0 = Sunday, 1 = Monday, etc.
              
              const weekStart = new Date(today);
              weekStart.setDate(today.getDate() - dayOfWeek);
              weekStart.setHours(0, 0, 0, 0);
              
              const weekEnd = new Date(weekStart);
              weekEnd.setDate(weekStart.getDate() + 6);
              weekEnd.setHours(23, 59, 59, 999);
              
              // Calculate hours for each day of the week
              const weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
              const dailyHours = Array(7).fill(0);
              
              timeEntries.forEach(entry => {
                  const entryDate = new Date(entry.date);
                  if (entryDate >= weekStart && entryDate <= weekEnd) {
                      const dayIndex = entryDate.getDay();
                      dailyHours[dayIndex] += entry.duration;
                  }
              });
              
              // Find max hours for scaling
              const maxHours = Math.max(...dailyHours) || 1000 * 60 * 60 * 8; // Default to 8 hours if no data
              
              // Calculate total hours
              const totalMilliseconds = dailyHours.reduce((sum, hours) => sum + hours, 0);
              const totalHours = Math.floor(totalMilliseconds / (1000 * 60 * 60));
              const totalMinutes = Math.floor((totalMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
              weeklyTotalHours.textContent = `${totalHours}h ${totalMinutes}m`;
              
              // Create bars for each day
              weekDays.forEach((day, index) => {
                  const hours = dailyHours[index];
                  const heightPercentage = Math.max(5, (hours / maxHours) * 100); // Minimum 5% height for visibility
                  
                  const barContainer = document.createElement('div');
                  barContainer.className = 'flex-1 flex flex-col items-center';
                  
                  const bar = document.createElement('div');
                  bar.className = 'bg-blue-500 w-full rounded-t-sm';
                  bar.style.height = `${heightPercentage}%`;
                  
                  const label = document.createElement('span');
                  label.className = 'text-xs text-gray-500 dark:text-gray-400 mt-1';
                  label.textContent = day;
                  
                  barContainer.appendChild(bar);
                  barContainer.appendChild(label);
                  weeklyChart.appendChild(barContainer);
              });
          }
          
          // Update project distribution
          function updateProjectDistribution() {
              projectDistribution.innerHTML = '';
              
              // Get date range based on selected period
              const today = new Date();
              let startDate;
              
              switch (projectChartPeriod.value) {
                  case 'week':
                      startDate = new Date(today);
                      startDate.setDate(today.getDate() - today.getDay());
                      break;
                  case 'month':
                      startDate = new Date(today.getFullYear(), today.getMonth(), 1);
                      break;
                  case 'year':
                      startDate = new Date(today.getFullYear(), 0, 1);
                      break;
              }
              
              startDate.setHours(0, 0, 0, 0);
              
              // Calculate hours per project
              const projectHours = {};
              let totalHours = 0;
              
              timeEntries.forEach(entry => {
                  const entryDate = new Date(entry.date);
                  if (entryDate >= startDate && entryDate <= today) {
                      const project = entry.project || 'Unassigned';
                      if (!projectHours[project]) {
                          projectHours[project] = 0;
                      }
                      projectHours[project] += entry.duration;
                      totalHours += entry.duration;
                  }
              });
              
              // Sort projects by hours (descending)
              const sortedProjects = Object.keys(projectHours).sort((a, b) => projectHours[b] - projectHours[a]);
              
              // Create bars for each project
              const colors = ['blue', 'green', 'purple', 'amber', 'pink', 'indigo'];
              
              sortedProjects.forEach((project, index) => {
                  const hours = projectHours[project];
                  const percentage = Math.round((hours / totalHours) * 100) || 0;
                  const color = colors[index % colors.length];
                  
                  const projectElement = document.createElement('div');
                  projectElement.innerHTML = `
                      <div class="flex items-center justify-between">
                          <span class="text-sm text-gray-700 dark:text-gray-300">${project}</span>
                          <span class="text-sm text-gray-700 dark:text-gray-300">${percentage}%</span>
                      </div>
                      <div class="w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2 mt-1">
                          <div class="bg-${color}-500 h-2 rounded-full" style="width: ${percentage}%"></div>
                      </div>
                  `;
                  
                  projectDistribution.appendChild(projectElement);
              });
              
              // Show message if no data
              if (sortedProjects.length === 0) {
                  const noDataElement = document.createElement('div');
                  noDataElement.className = 'text-center py-4 text-gray-500 dark:text-gray-400';
                  noDataElement.textContent = 'No data available for the selected period';
                  projectDistribution.appendChild(noDataElement);
              }
          }
          
          // Update UI
          function updateUI() {
              renderTimeEntries();
              updateWeeklyChart();
              updateProjectDistribution();
          }
          
          // Save time entries to localStorage
          function saveTimeEntries() {
              localStorage.setItem('timeEntries', JSON.stringify(timeEntries));
          }
          
          // Load time entries from localStorage
          function loadTimeEntries() {
              const savedEntries = localStorage.getItem('timeEntries');
              if (savedEntries) {
                  timeEntries = JSON.parse(savedEntries);
              }
          }
          
          // Initialize with sample data
          function initializeSampleData() {
              // Try to load from localStorage first
              loadTimeEntries();
              
              // If no entries, add sample data
              if (timeEntries.length === 0) {
                  const today = new Date();
                  const yesterday = new Date(today);
                  yesterday.setDate(today.getDate() - 1);
                  
                  const twoDaysAgo = new Date(today);
                  twoDaysAgo.setDate(today.getDate() - 2);
                  
                  const threeDaysAgo = new Date(today);
                  threeDaysAgo.setDate(today.getDate() - 3);
                  
                  timeEntries = [
                      {
                          id: '1',
                          description: 'Website redesign',
                          project: 'project1',
                          tags: ['design'],
                          startTime: '09:00',
                          endTime: '11:30',
                          duration: 2.5 * 60 * 60 * 1000,
                          date: today.toISOString().split('T')[0],
                          billable: true
                      },
                      {
                          id: '2',
                          description: 'Client meeting',
                          project: 'project2',
                          tags: ['meeting'],
                          startTime: '13:00',
                          endTime: '14:00',
                          duration: 1 * 60 * 60 * 1000,
                          date: today.toISOString().split('T')[0],
                          billable: true
                      },
                      {
                          id: '3',
                          description: 'Bug fixes',
                          project: 'project1',
                          tags: ['development'],
                          startTime: '15:00',
                          endTime: '17:30',
                          duration: 2.5 * 60 * 60 * 1000,
                          date: yesterday.toISOString().split('T')[0],
                          billable: true
                      },
                      {
                          id: '4',
                          description: 'Research new technologies',
                          project: 'project3',
                          tags: ['research'],
                          startTime: '10:00',
                          endTime: '12:00',
                          duration: 2 * 60 * 60 * 1000,
                          date: yesterday.toISOString().split('T')[0],
                          billable: false
                      },
                      {
                          id: '5',
                          description: 'Team planning',
                          project: 'project2',
                          tags: ['planning', 'meeting'],
                          startTime: '09:30',
                          endTime: '10:30',
                          duration: 1 * 60 * 60 * 1000,
                          date: twoDaysAgo.toISOString().split('T')[0],
                          billable: true
                      },
                      {
                          id: '6',
                          description: 'Documentation',
                          project: 'project1',
                          tags: ['documentation'],
                          startTime: '14:00',
                          endTime: '16:00',
                          duration: 2 * 60 * 60 * 1000,
                          date: threeDaysAgo.toISOString().split('T')[0],
                          billable: false
                      }
                  ];
                  
                  // Save sample data
                  saveTimeEntries();
              }
          }
          
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
          window.toggleDarkMode = function() {
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
          };
      });
  </script>
</x-app-layout>

