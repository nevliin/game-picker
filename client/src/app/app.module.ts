import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';

import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {HttpClientModule} from "@angular/common/http";
import {FormsModule, ReactiveFormsModule} from "@angular/forms";
import {OverviewComponent} from './overview/overview.component';
import {ReorderComponent} from './reorder/reorder.component';
import {DragDropModule} from "@angular/cdk/drag-drop";

@NgModule({
    declarations: [
        AppComponent,
        OverviewComponent,
        ReorderComponent
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        HttpClientModule,
        ReactiveFormsModule,
        FormsModule,
        DragDropModule
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {
}
