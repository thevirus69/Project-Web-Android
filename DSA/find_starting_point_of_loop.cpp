#include<bits/stdc++.h>
using namespace std;

struct Node{

    int data;
    Node *next;
    Node(int data){
        this->data=data;
        next=NULL;
    }
};

Node *startingLoop(struct Node * head){

    if(head == NULL || head->next==NULL) return NULL;

    Node *slow=head;
    Node *fast=head;

    slow=slow->next;
    fast=fast->next->next;

    while(fast && fast->next!=NULL){
        if(slow==fast)
        break;
        slow=slow->next;
        fast=fast->next->next;
    }

    if(slow!=fast)
        return NULL;

        slow=head;
        while(slow!=fast){
            slow=slow->next;
            fast=fast->next;
        }
        return slow;


}

int main(){
    
    
    Node* head = new Node(1);
    head->next = new Node(2);
    head->next->next = new Node(3);
    head->next->next->next = new Node(4);
    head->next->next->next->next = new Node(5);
    head->next->next->next->next->next = new Node(6);
    head->next->next->next->next->next->next = new Node(7);
    head->next->next->next->next->next->next->next = new Node(8);

    head->next->next->next->next->next = head->next->next;

    Node* res = startingLoop(head);

    if(res==NULL) cout<<"Loop does exist";
    else cout<<"Loop is starting node is "<<res->data;

    return 0;
}
