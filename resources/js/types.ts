export interface Issue {
  id: number;
  number: number;
  title: string;
  body?: string;
  created_at: string;
  repository: {
    name: string;
    owner: { login: string };
  };
}
