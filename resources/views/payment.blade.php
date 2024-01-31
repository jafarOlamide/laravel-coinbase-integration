<x-app-layout>
    <div>
        <form method="POST" action="{{ route('payment.process') }}">
            <label for="amount">Amount To Pay</label>
            <input name="amount" required />

            <x-primary-button>PAY</x-primary-button>
        </form>
    </div>
</x-app-layout>
