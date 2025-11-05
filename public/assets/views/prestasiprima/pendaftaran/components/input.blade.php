<div>
    <label class="block text-gray-700 font-medium mb-1">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}"
           name="{{ $name }}"
           value="{{ old($name) }}"
           {{ !empty($required) ? 'required' : '' }}
           class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-500" />
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
