@props(['available' => false])
<span @class(['badge', 'yes' => $available, 'no' => ! $available])>
    {{ $available ? 'В наявності' : 'Немає' }}
</span>
