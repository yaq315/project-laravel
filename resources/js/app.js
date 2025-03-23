import './bootstrap';
function checkAuth(event) {
    // تحقق مما إذا كان المستخدم مسجل الدخول
    const isLoggedIn = document.querySelector('meta[name="user-logged-in"]').content === 'true';

    if (!isLoggedIn) {
        event.preventDefault(); // إيقاف إرسال الفورم
        alert('Please log in to book an adventure.'); // رسالة تنبيه
        window.location.href = '/login'; // توجيه المستخدم إلى صفحة تسجيل الدخول
        return false;
    }
    return true;
}

function isUserLoggedIn() {
    // Replace with your actual authentication check
    return document.querySelector('meta[name="user-logged-in"]').content === 'true';
}