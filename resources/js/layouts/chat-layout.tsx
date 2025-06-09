import AppLayoutTemplate from '@/layouts/app/app-sidebar-layout';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/react';
import { useEffect, type ReactNode } from 'react';
import AppLayout from './app-layout';
import Echo from '@/echo';

interface ChatLayoutProps {
    children: ReactNode;
    breadcrumbs?: BreadcrumbItem[];
}

export default function ChatLayout({ children, breadcrumbs = [] }: ChatLayoutProps) {

    //listen to the online event 
    useEffect(()=>{
         Echo.join('online')
         .here((users:any)=>{
            console.log('here',users);
         })
         .joining((user:any)=>{
            console.log('joining',user);
         })
         .leaving((user:any)=>{
            console.log('leaving',user);
         }).error((error:any)=>{
            console.log('error',error);
         });

        // leave the channel when the component is unmounted
         return ()=>{
            Echo.leave('online');
         }; 
    },[]);

    return (
        <>
            <Head title="Chat" />
            {children}
        </>
    );
}