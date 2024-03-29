<div x-data="{ text: '' }" x-show="text.length" x-cloak
     x-on:notification.window="text = $event.detail.text; setTimeout(() => text = '', $event.detail.timeout || 2000)"
     class="fixed inset-0 flex px-4 py-6 items-start pointer-events-none">
	<div class="w-full flex flex-col items-center space-y-4">
		<div class="max-w-sm w-full bg-gray-900 rounded-lg pointer-events-auto">
			<div class="p-4 flex items-center">
				<div class="ml-2 w-0 flex-1 text-white" x-text="text"></div>

				<button class="inline-flex text-gray-400" @click="text = ''">
					<span class="sr-only">Close</span>
					<span class="text-2xl">&times;</span>
				</button>
			</div>
		</div>
	</div>
</div>
