<!-- admin-dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Statistics Section -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Statistics</h3>
                <!-- Add your statistics widgets here -->
            </div>

            <!-- Recent Activities Section -->
            <div class="col-span-2 bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Recent Activities</h3>
                <!-- Add your recent activities list or timeline here -->
            </div>

            <!-- Quick Actions Section -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                <!-- Add your quick action buttons or links here -->
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="mt-8 bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Main Content</h2>
            <!-- Your main content goes here -->
        </div>
    </div>
</x-app-layout>
