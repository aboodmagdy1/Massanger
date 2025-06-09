import AppLayout from '@/layouts/app-layout';
import ChatLayout from '@/layouts/chat-layout';
import { Head } from '@inertiajs/react';
import { usePage } from '@inertiajs/react';

function Home() {
    const page = usePage();
    return (
        <>
            {page.props.abood as string}
        </>
    );
}

// persist the layout
Home.layout = (page:any)=>{
    return (
        <AppLayout>
            <ChatLayout>
              <h1>Messages</h1>
            </ChatLayout>
        </AppLayout>
    )
}

export default Home;


