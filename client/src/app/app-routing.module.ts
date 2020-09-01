import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {ReorderComponent} from "./reorder/reorder.component";
import {OverviewComponent} from "./overview/overview.component";


const routes: Routes = [
    {
        path: 'reorder/:name',
        component: ReorderComponent
    },
    {
        path: '',
        component: OverviewComponent
    }
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule {
}
